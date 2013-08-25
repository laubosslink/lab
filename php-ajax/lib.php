<?php

class Ajax {
    
    private $stack = array();
    
    private function add_action($action, $values){
		$values['action'] = $action;
		array_push($this->stack, $values);
	}
    
    public function enable_form($selector){
		$this->add_action("enable_form", array('selector' => $selector));
    }
    
    public function disable_form($selector){
		$this->add_action("disable_form", array('selector' => $selector));
    }
    
    public function remove_element($selector, $id=null, $selector_id=null){
        
        if(empty($selector_id) || $selector_id == null){
            $selector_id = 'id';
        }
        
        array_push($this->stack, 
                    array(
						'action' => 'remove_element',
                        'selector' => $selector,
                        'id' => $id,
                        'selector_id' => $selector_id
                        )
                ); 
    }
    
    public function add_element($element, $selector){
        array_push($this->stack, 
                    array(
						'action' => 'add_element',
                        'element' => $element,
                        'selector' => $selector
                        )
                    );
    }
    
    public function set_element($element, $selector){
        array_push($this->stack, array(
					'action' => 'set_element',
                    'element' => $element,
                    'selector' => $selector
                )
        );
    }
    
    public function __toString() {
        $output = array();
        
        $output['stack_actions'] = $this->stack;
        
        return json_encode($output);
    }
    
    public function load_view(){
       echo $this->__toString();
    }
}

