<?php

/**
 * Version 3
 * */

class Ajax {
	
    private $stack = array();
    private $debug = false;
    
    private function add_action($action, $values) {
        $arr['action'] = $action;
        $arr['array_values'] = $values;
        array_push($this->stack, $arr);
    }

	//todo : add parameters of method. This method is little deprecated... but could be usefull in some case
	public function call_jquery_method($method, $selector){
		$this->add_action('call_jquery_method', array('method' => $method, 'selector' => $selector));
	}
	
	public function set_popup($options){
		if(is_array($options)){
			foreach($options as $option => $values){
				if($option == 'buttons'){
					
					$buttons = array();
					
					foreach($values as $button_text => $button_options){
						
						if(!is_array($button_options)){
							$button_text = $button_options;
						}
						
						$array_button_options = array(
							'id' => $button_options['id'],
							'text' => $button_text,
							'action' => $button_options['action'],
							'link' => $button_options['link']
						);
						
						array_push($buttons, $array_button_options);
					}
					
					$this->add_action('set_popup_buttons', $buttons);
				} 
			}
		}
	}

    public function popup_add($html) {
        $this->add_action('popup', array('html' => $html));
    }

    public function enable_form($selector) {
        $this->add_action('enable_form', array('selector' => $selector));
    }

    public function disable_form($selector) {
        $this->add_action('disable_form', array('selector' => $selector));
    }

    public function remove_element($selector, $selector_id = null, $id = null) {
        $array = array(
					'selector' => $selector,
					'id' => $id,
					'selector_id' => $selector_id
				);

        $this->add_action('remove_element', $array);
    }

    public function add_element($element, $selector) {
        $array = array(
					'element' => $element,
					'selector' => $selector
				);

        $this->add_action('add_element', $array);
    }

    public function set_element($element, $selector) {
        $array = array(
					'element' => $element,
					'selector' => $selector
				);

        $this->add_action('set_element', $array);
    }

    public function __toString() {
        $output = array();
		
		if($this->debug){
            $this->add_action("debug", array("message" => "DEBUG_MSG_TODO"));
        }
        
        $output['stack_actions'] = $this->stack;

        return json_encode($output);
    }

    public function load_view() {
        echo $this->__toString();
    }
    
    public function view(){
        $this->load_view();
        exit(0);
    }
}

