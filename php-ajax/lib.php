<?php

class Ajax {
	
    private $stack = array();

    private function add_action($action, $values) {
        $values['action'] = $action;
        array_push($this->stack, $values);
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
        $array = array('selector' => $selector,
            'id' => $id,
            'selector_id' => $selector_id);

        $this->add_action('remove_element', $array);
    }

    public function add_element($element, $selector) {
        $array = array('element' => $element,
            'selector' => $selector);

        $this->add_action('add_element', $array);
    }

    public function set_element($element, $selector) {
        $array = array('element' => $element,
            'selector' => $selector);

        $this->add_action('set_element', $array);
    }

    public function __toString() {
        $output = array();

        $output['stack_actions'] = $this->stack;

        return json_encode($output);
    }

    public function load_view() {
        echo $this->__toString();
    }
}

