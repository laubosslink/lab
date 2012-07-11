<?php

/* Devient obsolète
 * function __autoload($class){
	include($class.".php");
}
*/

// Alternative : 
function my_class_autoloader($class_name){
	if(is_file($class_name.".php")){
		include($class_name.".php");
	} 
}

spl_autoload_register('my_class_autoloader');

class HelloWorld {
}

// Se trouve ici
$obj = new HelloWorld();

//Se trouuve dans MyClass.php
$obj2 = new MyClass();

// Se trouve dans try/TryClass.php
$obj3 = new TryClass();
