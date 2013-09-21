<?php

function call_ajax_method($name){
	echo "action.php?call=".$name;
}

include "lib.php";

//call_register_element();

?>

<html
	<head>
		<title>Test ajax lib</title>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery-ui.js"></script>
		
		<script type="text/javascript" src="ext.js"></script>
		
		<script type="text/javascript" src="ajax-lib.js"></script>
	</head>
	<body>
		
		<input type="hidden" name="data-call-ajax-init" data-call-ajax="<?php call_ajax_method("call_register_element"); ?>" />
		
		<p><span id="call_in_response"></span></p>
		<table border="1">
			<tr>
				<th>head 1</th>
				<th>head 2</th>
				<th>copy</th>
				<th>delete</th>
			</tr>
			<tr>
				<td>Hi 1</td>
				<td>Hi 2</td>
				<td>-></td>
				<td>x</td>
			</tr>
			<tr>
				<td>Hi 3</td>
				<td>Hi 4</td>
				<td>-></td>
				<td>x</td>
			</tr>
		</table>
		
		<table border="1" style="float: right;">
			<tr>
				<th>head 1</th>
				<th>head 2</th>
				<th>delete</th>
			</tr>
		</table>
		
		<br />
		<br />
		
		
		<button type="button" name="hello" data-call-ajax="<?php call_ajax_method("popup_ajax"); ?>">Ajax button</button>
		<input type="button" name="hello" value="ajax-input" data-call-ajax="<?php call_ajax_method("popup_ajax"); ?>"/><br />
		<span id="response_popup_ajax"></span>
		<br />
		
		<button type="button" name="hello" data-call-ajax="<?php call_ajax_method("click"); ?>">Button</button>
		<input type="button" name="hello" value="Click !" data-call-ajax="<?php call_ajax_method("click"); ?>"/><br />
		<span id="click_response"></span>
		<br />
		
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
		
		
		<input type="checkbox" name="index[1]" value="lol" /><br />
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
		
		<div id="area-ip-change">
			<input type="number" name="ip[0]" data-call-ajax="<?php call_ajax_method("ip"); ?>" data-call-area-element="#area-ip-change" />.
			<input type="number" name="ip[1]" data-call-ajax="<?php call_ajax_method("ip"); ?>" data-call-area-element="#area-ip-change" /><br />
			Response #1 : <div id="ip_response_1"></div><br />
			Response #2 : <div id="ip_response_2"></div><br />
		</div>
		
		<input type="number" name="ip_no_array" data-call-ajax="<?php call_ajax_method("ip_no_array"); ?>" /><br />
		Response #1 : <div id="ip_response_1_n"></div><br />
		Response #2 : <div id="ip_response_2_n"></div><br />
		
		<form method="post" data-call-ajax="<?php call_ajax_method("ip_form"); ?>">
		<input type="text" name="ip_form" /><br />
		Response #1 : <div id="ip_form_response_1"></div><br />
		Response #2 : <div id="ip_form_response_2"></div><br />
		<input type="submit" /><br />
		</form>
		
		<button type="button" name="hello" data-call-ajax="<?php call_ajax_method("call_register_element"); ?>">Open</button><button type="button" name="hello" data-call-ajax="<?php call_ajax_method("call_hidden_element"); ?>">Hidden</button><br />
		
		    <div id="tabs">
			<ul>
				<li><a href="#tabs-1">Network Devices</a></li>
				<li><a href="#tabs-2">Contacts</a></li>
			</ul>
				<div id="tabs-1">YES !</div>
				<div id="tabs-2">We are register...</div>
			</div>
	</body>
</html>
