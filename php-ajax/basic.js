/*
 * This script require : jquery, jquery-ui
 * version 2 (with issue)
 */

var DEFAULT_DIALOG_ID = "out_dialog";
var DEFAULT_ATTR_CATCH = "data-call-ajax";

$(document).ready(function() {

    // If a <div> with default dialog id exist, we open the dialog
    register_dialog('#' + DEFAULT_DIALOG_ID);

    $("input").change(function(event) {
        if ($(this).attr(DEFAULT_ATTR_CATCH)) {
            event.preventDefault();

            $current_link = $(this);

            var attr = $current_link.attr('name').toString().split('[');
            var supp;

            if (this.type == 'checkbox') {
                $("input[name*='" + attr[0] + "']").each(function() {
                    if (this.checked) {
                        supp += "&" + this.name + "=" + this.value;
                    }
                });
            } else {
                supp = "&" + this.name + "=" + this.value;
            }

            $.ajax({
                type: "POST",
                url: $current_link.attr(DEFAULT_ATTR_CATCH),
                data: $current_link.data() + supp,
                success: function(result) {
                    parse_result(result);
                },
                error: function() {
                    alert("There is problem with input change.");
                    console.log(result);
                    event.preventDefault();
                }
            });
        }
    });

	$('button,input[type="button"]').on("click", function(event){
		 if ($(this).attr(DEFAULT_ATTR_CATCH)) {
		    event.preventDefault();

            $current_link = $(this);

            $.ajax({
                type: "POST",
                url: $current_link.attr(DEFAULT_ATTR_CATCH),
                data: $current_link.data(),
                success: function(result) {
                    parse_result(result);
                },
                error: function() {
                    alert("There is problem with button click.");
                    console.log(result);
                    event.preventDefault();
                }
            });
        }
	});

    $('form').on('submit', function(event) {
        if ($(this).attr(DEFAULT_ATTR_CATCH)) {

            $current_link = $(this);

            // Retrieve label
            posts = $(this).serialize().split("&");
            labels = "";
            for (var i in posts) {
                post = ((String)(posts[i]).split("="))[0];

                // Post with array
                if (((String)(post)).indexOf('%') !== -1) {
                    post = ((String)(posts[i]).split("%"))[0];
                }

                console.log($('label[for="' + post + '"]').html());
                labels += "&label_" + post + "=" + $('label[for="' + post + '"]').html();
            }

            $.ajax({
                type: "POST",
                url: $(this).attr(DEFAULT_ATTR_CATCH),
                data: $(this).serialize() + labels,
                async: false,
                success: function(result) {
                    if (result) {
                        event.preventDefault();
                        parse_result(result);
                    }
                },
                error: function() {
                    alert("There is problem with submit form.");
                    console.log(result);
                    event.preventDefault();
                }
            });
        }
    });
    
        
	//TODO click on td table and <button> new on html5..
    $(document).on('click', "tr,td,a", function(event) {
        if ($(this).attr(DEFAULT_ATTR_CATCH)) {
            event.preventDefault();
            $current_link = $(this);
            
            // first we retrieve ajax data to add in popup
            
            if($current_link.attr("data-action-message")){
                open_dialog($current_link.attr("data-action-message"));
            } else {
                open_dialog("Are you sure ?");
            }
            
            $('#'+DEFAULT_DIALOG_ID).dialog('option', 'buttons', {
                "Continue": function() {
                    $.ajax({
                        type: "POST",
                        url: $current_link.attr(DEFAULT_ATTR_CATCH),
                        data: $current_link.data(),
                        async: false,
                        success: function(result) {
                            parse_result(result);
                        },
                        error: function() {
                            alert("There is problem with link.");
                            console.log(result);
                            event.preventDefault();
                        }
                    });
                    $(this).dialog("close");
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            });
            
            $('#'+DEFAULT_DIALOG_ID).dialog("open");
        }
    });
});

/**
 * Parse result
 * @param {mixed} result_from_server A result from server
 */
function parse_result(result_from_server) {
    if (!is_json_string(result_from_server)) {
        open_dialog(result_from_server);
    } else {
        result = JSON.parse(result_from_server).stack_actions;

        var popup_values = "";

        for (key in result)
        {
            action = result[key].action;
            a = result[key].array_values;

            if (action == "remove_element")
            {
                remove_element(a.element, a.id, a.selector_id);
            } else if (action == "add_element")
            {
                add_element(a.element, a.selector);
            } else if (action == "set_element")
            {
                set_element(a.element, a.selector);
            } else if (action == "disable_form")
            {
                disable_form(a.selector);
            } else if (action == "enable_form")
            {
                enable_form(a.selector);
            } else if (action == "popup") 
            {
                popup_values += a.html;
            } else if(action == "debug")
            {
                open_dialog(a.message);
            }
        }

        if (popup_values) {
            open_dialog(popup_values);
        }
        
        for (key in result)
        {
            action = result[key].action;
            a = result[key].array_values;

			if(action == 'set_popup_buttons')
			{
					set_popup_buttons(a);
			}
		}
    }
}

/**
 * Set all the buttons of DEFAULT_DIALOG_ID popup
 */
function set_popup_buttons(buttons){
	var buttons_options = new Array();
	
	for(key in buttons){
		button = buttons[key];
		
		if(button.action == 'close'){
			button.action = function(){
				$(this).dialog("close");
			}
		} else if(button.action == 'call-ajax'){
			console.log("out : " + button.link);
			
			button.action = function(){
				
				console.log("in : " + button.link);
				
				$.ajax({
					type: "POST",
					url: button.link, // DONT FIND button object... please thinking about search the link in DOM /!\
					//data: $("#"+DEFAULT_DIALOG_ID).data(),
					async: false,
					success: function(result) {
						parse_result(result);
					},
					error: function() {
						alert("There is problem call-ajax from popup.");
						console.log(result);
					}
				});
			}
		}
		
		buttons_options.push( { text:button.text, click:button.action } );
	}
	
	$("#" + DEFAULT_DIALOG_ID).dialog("option", "buttons", buttons_options);	
}

/**
 * Set an element on html document
 * @param {string} element
 * @param {string} selector
 */
function set_element(element, selector) {
    $(selector).html(element);
}

/**
 * Add an element on html document
 * @param {string} element
 * @param {string} selector
 */
function add_element(element, selector) {
    $(selector).append(element);
}

/**
 * Remove an element on html document
 * @param {string} selector
 * @param {integer} id
 * @param {string} selector_id
 */
function remove_elements(selector, id, selector_id) {

    // First we search if there is a data-id
    if (id !== null) {
        $(selector).find('[data-' + selector_id + '="' + id + '"]').remove();
    } else { // Else we delete the element represent by the selector
        $(selector).remove();
    }
}

/**
 * Disable all fields in a form
 * @param {string} selector
 */
function disable_form(selector) {
    $(selector).closest('form').find('input,textarea,select,button').prop('disabled', true);
}

/**
 * Enable all fields in multiple forms
 * @param {string} selector 
 */
function enable_form(selector) {
    $(selector).closest('form').find('input,textarea,select,button').prop('disabled', false);
}

/**
 * Register diaglog
 * @param {string} selector
 */
function register_dialog(selector) {
    $(selector).dialog({
        autoOpen: false,
        width: 600,
        title: "Dialog",
        show: {
			effect: "fade",
			duration: 1000
		},
		hide: {
			effect: "fade",
			duration: 1000
		},
        modal: true
    });
}

/**
 * Permit to know if the string could be parse with JSON
 * @param {type} str The string 
 * @returns {Boolean} True if it could be parse
 */
function is_json_string(str) {

    if (str.substr(0, 1) != "{") {
        return false;
    }

    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }

    return true;
}

/**
 * Permit to open popup dialog
 * @param {type} html The message
 * @returns {undefined}
 */
function open_dialog(html) {
    $('#' + DEFAULT_DIALOG_ID).remove();
    $("body").append('<div id="' + DEFAULT_DIALOG_ID + '">' + html + "</div>");
    register_dialog('#' + DEFAULT_DIALOG_ID);
    $('#' + DEFAULT_DIALOG_ID).dialog("open");
}
