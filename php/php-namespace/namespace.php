<?php

//Espace de travail test
namespace test;

print("[Test]<br /><br />");

class HelloWorld {
	public function toString($string=null){
		return "Hello World $string !";
	}
}

$helloWorld = new HelloWorld();
print("->".$helloWorld->toString());

// On est dans un autre espace de travail
namespace otherWorld\titi\toto;
// On doit spécifier le fait qu'on veut l'utiliser !
use \test;

print("<br /><br />[otherWorld\\titi\\toto]");

class HelloWorld {
	public function toString(){
		return "Hello World 3 !";
	}
} 

print("</br></br>");

$helloWorld = new test\HelloWorld();
print("->".$helloWorld->toString("2"));


print("</br></br>");

$helloWorld = new HelloWorld();
print("->".$helloWorld->toString());

namespace toto;
use otherWorld\titi\toto;

print("<br /><br />[toto]");

// Si on enlève au début \ ça pose problème
$helloWorld = new \otherWorld\titi\toto\HelloWorld();
print("<br />->". $helloWorld->toString());

