<?php

require "cli-config.php";

//Ajout d'ordinateurs

$computers = new Computers();

$computers->setDescription("L'ordinateur de laurent");
//$em->persist($computers);
//$em->flush();

$computers->setDescription("L'ordinateur d'alexandre");
//$em->persist($computers);
//$em->flush();

// Ajout d'un ordinateur à un utilisateur
$user = $em->createQuery("SELECT u FROM Users u WHERE u.username = :user")->setParameter(':user', 'laurent')->getResult();
$user = $user[0];

$computer = $em->createQuery("SELECT c FROM Computers c WHERE c.id = :id")->setParameter(':id', 1)->getResult();
$computer = $computer[0];

// On vérifie que l'utilisateur n'a pas déjà l'ordinateur
if(!$user->computerExist($computer)){
	$user->addComputers($computer);
	$em->persist($user);
	$em->flush();
} 

function list_computers(){
	global $em;
	
	// Liste des ordinateurs
	echo "[ Liste des ordinateurs ] <br /><br />";
	$ordinateurs = $em->createQuery("SELECT c FROM Computers c")->getResult();

	foreach($ordinateurs as $ordinateur){
		echo "Numero : " . $ordinateur->getId() . "<br />";
		echo "Description : " . $ordinateur->getDescription() . "<br />";
		echo "<br /><br />";
	}
}

function list_users(){
	global $em;
	
	// Liste des utilisateurs 
	echo "[ Liste des utilisateurs ] <br /><br />";
	$users = $em->createQuery("SELECT u FROM Users u")->getResult();

	foreach($users as $user){
		echo "Utilisateur : " . $user->getUsername() . "<br />";
		echo "Données perso : ";
		if(count($user->getDatas()) > 0){
			foreach($user->getDatas() as $data){
				echo $data->getDescription() . "/";
			}
		} else {
			echo "PAS DE DONNEES,";
		}
		
		echo "<br />Ordinateurs : ";
		foreach($user->getComputers() as $computer){
			echo $computer->getDescription().", ";
		}
		
		echo "<br /><br />";
	}
}

//list_computers();
//list_users();

// On essaie les jointures
/*
$sql = "SELECT u, c FROM Users u JOIN u.computers c";
$q = $em->createQuery($sql);
$array = $q->getArrayResult();

foreach($array as $a){
	print($a['username']."<br />");
	print("With : ");
	foreach($a['computers'] as $c){
		print($c['description'].", ");
	}
}
*/
