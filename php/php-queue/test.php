<?php

class Test {
	private $a;

	public function __construct() {
		$this->a = new \SplQueue();
		$this->a->enqueue('hello');
		$this->a->enqueue('world');
	}

	public function __toString() {
		$output = "";

		foreach($this->a as $value)
			$output .= $value . PHP_EOL;

		return $output;
	}
}

$t = new Test();
print($t);
