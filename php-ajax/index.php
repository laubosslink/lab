<?php

function call_ajax_method($name){
	echo "action.php?call=".$name;
}

include "lib.php";

?>

<html
	<head>
		<title>Test ajax lib</title>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery-ui.js"></script>
		<script type="text/javascript" src="basic.js"></script>
	</head>
	<body>
		<br />
		You need ? 
		Yes <input type="radio" name="need" value="yes" data-call-ajax="<?php call_ajax_method("radio"); ?>"/>
		/ No <input type="radio" name="need" value="no" data-call-ajax="<?php call_ajax_method("radio"); ?>"/>
		<br /> Value : <span id="radio_response"></span>
		<br />
		<br />
		
		closeForm<input type="radio" name="test" value="ok" data-call-ajax="<?php call_ajax_method("close_form"); ?>"/><br />
		openForm<input type="radio" name="test" value="ok" data-call-ajax="<?php call_ajax_method("open_form"); ?>"/><br />
		
		<form method="post" id="the_form" data-call-ajax="<?php call_ajax_method("radio_form"); ?>">
		<br />
		You need ? 
		Yes <input type="radio" name="need" value="yes" />
		/ No <input type="radio" name="need" value="no" />
		<br /> Value : <span id="radio-form_response"></span>
		<br /><input type="submit" />
		</form>
		<br />
		<br />
		
		indexV<input type="checkbox" name="indexV" value="1" data-call-ajax="<?php call_ajax_method("checkbox_1"); ?>"/><br />
		indexV<input type="checkbox" name="indexV" value="2" data-call-ajax="<?php call_ajax_method("checkbox_1"); ?>"/><br />
		Value : <div id="checkbox_1_value"></div>
		<br />
		<br />
		
		
		<input type="checkbox" name="index[1]" value="lol" data-call-ajax="<?php call_ajax_method("checkbox2"); ?>"/><br />
		<input type="checkbox" name="index[2]" data-call-ajax="<?php call_ajax_method("checkbox2"); ?>"/><br />
		<input type="checkbox" name="index[3]" data-call-ajax="<?php call_ajax_method("checkbox2"); ?>"/><br />
		<input type="checkbox" name="index[7]" data-call-ajax="<?php call_ajax_method("checkbox2"); ?>"/><br />
		<input type="checkbox" name="index[10]" data-call-ajax="<?php call_ajax_method("checkbox2"); ?>"/><br />
		Response : <div id="checkbox2_response"></div><br />
		
		<form method="post" data-call-ajax="<?php call_ajax_method("checkbox2_form"); ?>">
		<input type="checkbox" name="index2[1]" /><br />
		<input type="checkbox" name="index2[2]" /><br />
		<input type="checkbox" name="index2[3]" /><br />
		<input type="checkbox" name="index2[7]" /><br />
		<input type="checkbox" name="index2[10]" /><br />
		<input type="submit" /><br />
		Response : <div id="checkbox2_form_response"></div><br />
		</form>
		
		<form data-call-ajax="<?php call_ajax_method("ip"); ?>">
		<input type="number" name="ip" data-call-ajax="<?php call_ajax_method("ip"); ?>" /><br />
		Response #1 : <div id="ip_response_1"></div><br />
		Response #2 : <div id="ip_response_2"></div><br />
		</form>
		
		<form method="post" data-call-ajax="<?php call_ajax_method("ip_form"); ?>">
		<input type="text" name="ip_form" /><br />
		Response #1 : <div id="ip_form_response_1"></div><br />
		Response #2 : <div id="ip_form_response_2"></div><br />
		<input type="submit" /><br />
		</form>
	</body>
</html>
