<?php

include("lib.php");

function radio_a(){
	$ajax = new Ajax();
	
	$ajax->popup_add($_POST["label_need_a"]["arr"]);
	
	$ajax->load_view();
}

function call_hidden_element(){
	$ajax = new Ajax();
	
	$ajax->call_jquery_method("hide", "#tabs");
	
	$ajax->load_view();
}

function call_register_element(){
	$ajax = new Ajax();
	
	$ajax->call_jquery_method("tabs", "#tabs");
	$ajax->call_jquery_method("show", "#tabs");
	
	$ajax->load_view();
}

function call_in_popup(){
		$ajax = new Ajax();
		
		$ajax->set_element("call in popup", "#call_in_response");
		
		$ajax->load_view();
}

function call_from_popup(){
	$ajax = new Ajax();
	
	//$ajax->popup_add("Yes we do it !");
	
	$ajax->add_element('Add allo <br />', "#response_popup_ajax");
	
	$ajax->load_view();
	
}

function popup_ajax(){
	$ajax = new Ajax();
	
	//$ajax->add_element('<div id="out_dialog">Hello !</div>', "#response_popup_ajax");
	
	$ajax->popup_add('<form method="post" data-call-ajax="action.php?call=call_from_popup">
<select name="cars" data-call-ajax="action.php?call=call_in_popup">
  <option value="volvo">Volvo XC90</option>
  <option value="saab">Saab 95</option>
  <option value="mercedes">Mercedes SLK</option>
  <option value="audi">Audi TT</option>
</select>
<input type="submit" value="Submit">
</form>');
	
	$ajax->set_popup(
		array(
			'buttons' => array(
				'Call' => array(
					'action' => 'call-ajax',
					'link' => "action.php?call=call_from_popup" // could be a problem with the point... 
				), 
				'Close' => array(
					'action' => 'close'
				),
				'IDB' => array(
					'id' => 'test_external_ajax'
				),
				'CallExtFunc' => array(
					'action' => 'test_external_ajax'
				)
			)
		)
	);
	
	$ajax->load_view();
}

function click(){
	$ajax = new Ajax();
	
	$ajax->add_element("Congratulation, you've CLICK !", "#click_response");
	
	$ajax->load_view();
}

function radio(){
	$ajax = new Ajax();
	
	$ajax->set_element($_POST['need'], "#radio_response");
	
	$ajax->load_view();
}

function radio_form(){
	$ajax = new Ajax();
	
	$ajax->set_element($_POST['need'], "#radio-form_response");
	
	$ajax->load_view();
}

function checkbox_1(){
	$ajax = new Ajax();
	
	foreach($_POST as $key => $value){
		$ajax->set_element($key . " => " . $value, "#checkbox_1_value");
	}
	
	$ajax->load_view();
}

function checkbox2(){
	$ajax = new Ajax();
	
	$ajax->set_element("", "#checkbox2_response");
	
	foreach($_POST['index'] as $key => $value){
			//foreach($array as $index => $value){
				$ajax->add_element($key . " -> " . $value . "<br />" , "#checkbox2_response");
		//}
		
		$ajax->add_element("<br />", "#checkbox2_response");
	}
	
	$ajax->load_view();
}


function checkbox2_form(){
	$ajax = new Ajax();
	
	foreach($_POST as $key => $array){
		if(is_array($array)){
			foreach($array as $index => $value){
				$ajax->add_element($key . "[" . $index . "]" . " -> " . $value . "<br />" , "#checkbox2_form_response");
			}
		}
		
		$ajax->add_element("<br />", "#checkbox2_form_response");
	}
	
	$ajax->load_view();
}

function ip(){
	$ajax = new Ajax();
	
	if(count($_POST) > 1){
		$ajax->set_element("PROBLEM ! Normally count of post is 1", "#ip_response_1");
	} else {
		$ajax->set_element("OK .js dont search out of this area", "#ip_response_1");
	}
	
	$ajax->set_element($_POST['ip'], "#ip_response_2");
	
	$ajax->load_view();
}

function ip_no_array(){
	$ajax = new Ajax();
	
	foreach($_POST as $key => $value){
		$resp2 .= '<p>' . $key . " -> " . $value . '</p>';
	}
	
	$ajax->set_element($resp2, "#ip_response_1_n");
	
	$ajax->set_element($_POST['ip_no_array'], "#ip_response_2_n");
	
	$ajax->load_view();
}

function ip_form(){
	$ajax = new Ajax();
	
	$ajax->set_element($_POST['ip_form'], "#ip_form_response_1");
	$ajax->set_element($_POST['ip_form'], "#ip_form_response_2");
	
	if(!empty($_POST['ip_form']))
	{
		$ajax->popup_add("Correclty receive :)");
	} else {
		$ajax->popup_add("Please specify number....");
	}
	$ajax->load_view();
}

function close_form(){
	$ajax = new Ajax();
	
	$ajax->disable_form("#the_form_form");
	
	$ajax->load_view();
}

function open_form(){
	$ajax = new Ajax();
	
	$ajax->enable_form("#the_form_form");
	
	$ajax->load_view();
}

$method = $_GET['call'];

// call function
$method();
