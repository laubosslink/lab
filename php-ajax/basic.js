/*
 * This script require : jquery, jquery-ui
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
                async: false,
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
    
        
	//TODO click on td table
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
            data = result[key];

            if (data.action == "remove_element")
            {
                remove_element(data.element, data.id, data.selector_id);
            } else if (data.action == "add_element")
            {
                add_element(data.element, data.selector);
            } else if (data.action == "set_element")
            {
                set_element(data.element, data.selector);
            } else if (data.action == "disable_form")
            {
                disable_form(data.selector);
            } else if (data.action == "enable_form")
            {
                enable_form(data.selector);
            } else if (data.action == "popup") {
                popup_values += data.html;
            }
        }

        if (popup_values) {
            open_dialog(popup_values);
        }
    }
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
    $(selector).closest('form').find('input,textarea,select').prop('disabled', true);
}

/**
 * Enable all fields in multiple forms
 * @param {string} selector 
 */
function enable_form(selector) {
    $(selector).closest('form').find('input,textarea,select').prop('disabled', false);
}

/**
 * Register diaglog
 * @param {string} selector
 */
function register_dialog(selector) {
    $(selector).dialog({
        autoOpen: true,
        width: 600,
        title: "Dialog",
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
