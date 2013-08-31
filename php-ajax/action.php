<?php

include("lib.php");

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
	
	foreach($_POST as $key => $value){
		$resp2 .= '<p>' . $key . " -> " . $value . '</p>';
	}
	
	$resp2 = $ajax->set_element($resp2, "#ip_response_1");
	
	$ajax->set_element($_POST['ip'], "#ip_response_2");
	
	$ajax->load_view();
}

function ip_form(){
	$ajax = new Ajax();
	
	$ajax->set_element($_POST['ip_form'], "#ip_form_response_1");
	$ajax->set_element($_POST['ip_form'], "#ip_form_response_2");
	
	$ajax->popup_add("Correclty receive :)");
	
	$ajax->load_view();
}

function close_form(){
	$ajax = new Ajax();
	
	$ajax->disable_form("#the_form");
	
	$ajax->load_view();
}

function open_form(){
	$ajax = new Ajax();
	
	$ajax->enable_form("#the_form");
	
	$ajax->load_view();
}

$method = $_GET['call'];

// call function
$method();
