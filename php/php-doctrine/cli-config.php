<?php 

  require "Doctrine/ORM/Tools/Setup.php";
  Doctrine\ORM\Tools\Setup::registerAutoloadDirectory('.');

//  use Doctrine\ORM\Tools\Setup;
//  use Doctrine\ORM\EntityManager;

  $isDevMode = true;

  // the connection configuration
  $dbParams = array(
	  'driver' => 'pdo_mysql',
	  'user'  =>      'lab',
	  'password'      =>      '7DULcn6NaWdvVxaN',
	  'dbname'        =>      'lab',
	  'host'  =>      'localhost'
  );

  //$config = Setup::createAnnotationMetadataConfiguration(array('config/Entities/'), $isDevMode);
  $config = Doctrine\ORM\Tools\Setup::createYAMLMetadataConfiguration(array('config/yml/'), $isDevMode);
  $em = Doctrine\ORM\EntityManager::create($dbParams, $config);

  $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
      'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
  ));

 include("ORM/load.php");
