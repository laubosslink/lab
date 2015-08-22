<?php

class Test {
	public function hello() {
		print "Working" . PHP_EOL;
	}
}

class Test2 extends Test {
	public function hello2() {
		$this->hello(); // Check if $this mean also inheritance methods
		parent::hello(); // Check if it work in spite of it is not static method
	}
}

$t = new Test2();
$t->hello2();
