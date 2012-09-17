<?php

class Test {
	private $x=1;

	public function __call($method, $args){
		print("We call " . $method . "\n");
	}

	public function __get($name){
		print("--Use get for $name--\n");
		return call_user_func(array($this, 'get' . $name));
	}

	public function getx(){
		$this->x = 5;
		return $this;
	}

	public function aMethod(){
		$this->x = 10;
		return $this;
	}

	public function __toString(){
		return "toString() : " . $this->x . "\n";
	}
}

$test = new Test();
$test->aMethod();
print($test->ClassName1());
print($test->ClassName2);
print($test->x);

?>
