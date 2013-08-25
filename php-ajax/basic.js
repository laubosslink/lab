var DEFAULT_DIALOG_ID = "out_dialog";
var DEFAULT_ATTR_CATCH="data-call-ajax";

$(document).ready(function() {
    
    // If a <div> with default dialog id exist, we open the dialog
    register_dialog('#'+DEFAULT_DIALOG_ID);
    
    $("input").change(function(event){
        if ($(this).attr(DEFAULT_ATTR_CATCH)) {
            event.preventDefault();
            
            $current_link = $(this);
            
            attr = $current_link.attr('name').toString().split('[');
            var supp;
            
            $("input[name*='"+attr[0]+"']").each(function(){
				console.log(this.type);
				
				if(this.checked && this.type == 'checkbox'){
					supp += "&" + this.name + "=" + this.value;
				} else if(this.type != 'checkbox'){
					supp += "&" + this.name + "=" + this.value;
				}
			});
            
            console.log($current_link.data());
            
            /*
              $current_link = $(this);
            
            attr = $current_link.attr('name').toString().split('[');
            
            values = $("input[name*='"+attr[0]+"']").map(function(){return $(this).val();}).get();
            
            var supp;
            for(i in values){
                supp += "&" + attr[0] + "-" + i + "=" + values[i];
            }
            */
            
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

    // TODO click on td table
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
    
    $('form').on('submit', function(event) {
        //var formData = $(this).closest('form').serializeArray();  
        //console.log(formData);

        if ($(this).attr(DEFAULT_ATTR_CATCH)) {
            
            // Retrieve label
            posts = $(this).serialize().split("&");
            labels = "";
            for(var i in posts){
                post = ((String)(posts[i]).split("="))[0];
                
                // Post with array
                if(((String)(post)).indexOf('%') !== -1){
                    post = ((String)(posts[i]).split("%"))[0];
                }
                
                console.log($('label[for="'+post+'"]').html());
                labels += "&label_" + post + "=" + $('label[for="'+post+'"]').html();
            }
            
            $.ajax({
                type: "POST",
                url: $(this).attr(DEFAULT_ATTR_CATCH),
                data: $(this).serialize() + labels,
                async: false,
                success: function(result) {

                    //TODO message which are not in popup !

                    // If there is result, there is message, so we don't send form
                    // and we show messages..
                    if(result){
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
});

/**
 * Parse result
 * @param {array} result_from_server A result from server
 */
function parse_result(result_from_server){
	if (!is_json_string(result_from_server)) {
		open_dialog(result_from_server);
	} else {
		result = JSON.parse(result_from_server).stack_actions;
		
		for(key in result)
		{
			data = result[key];
			
			if (data.action == "remove_element") 
			{
				remove_element(data.element, data.id, data.selector_id);
			} else if(data.action == "add_element")
			{
				add_element(data.element, data.selector);
			} else if (data.action == "set_element") 
			{
				set_element(data.element, data.selector);
			} else if(data.action == "disable_form")
			{
				disable_form(data.selector);
			} else if (data.action == "enable_form")
			{
				enable_form(data.selector);
			}
			
			if(data.messages){
				open_dialog(data.messages);
			}
		}
	}
}

/**
 * Set an element on html document
 * @param {array} datas The datas
 */
function set_element(element, selector){
	$(selector).text(element);
}

/**
 * Add an element on html document
 * @param {array} datas The datas
 */
function add_element(element, selector){
	$(selector).append(element);
}

/**
 * Remove an element on html document
 * @param {array} datas The datas
 */
function remove_elements(selector, id, selector_id){
       
        // First we search if there is a data-id
        if(id !== null){
                $(selector).find('[data-'+selector_id+'="'+id+'"]').remove();
        } else { // Else we delete the element represent by the selector
            $(selector).remove();
        }
}

/**
 * Disable all fields in a form
 * @param {array} forms The forms
 */
function disable_form(selector){
	$(selector).closest('form').find('input,textarea,select').prop('disabled', true);
}

/**
 * Enable all fields in multiple forms
 * @param {array} forms The forms
 */
function enable_form(selector){
	$(selector).closest('form').find('input,textarea,select').prop('disabled', false);
}

/**
 * Register diaglog
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
    
    if(str.substr(0, 1) != "{"){
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
 * @param {type} message The message
 * @returns {undefined}
 */
function open_dialog(html) {
    $('#'+DEFAULT_DIALOG_ID).remove();
    $("body").append('<div id="'+DEFAULT_DIALOG_ID+'">'  + html + "</div>");
    register_dialog('#'+DEFAULT_DIALOG_ID);
    $('#'+DEFAULT_DIALOG_ID).dialog("open");
}

