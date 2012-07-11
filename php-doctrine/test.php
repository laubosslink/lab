<?php

require_once "cli-config.php";


$test = new Test();
//$test->setId(1);
$test->setDescription("Estelle <3 (".$test->getId().")");
//$em->persist($test);
//$em->flush();

//print($test->getDescription()."\n");


$tests = $em->createQuery("SELECT t FROM Test t")->getResult();

echo(count($tests)."\n");

foreach($tests as $test){
	echo $test->getId() . " with " . $test->getDescription() ;
	echo "\n";
}
