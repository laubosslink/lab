<?php

include('finder.php');
include('finderdb.php');
include('finderxml.php');
include('findertxt.php');

/*$f = new Finder();
$f->addNext(new FinderDB());
$f->addNext(new FinderXML());
$f->addNext(new FinderTXT());
*/

$f = new FinderDB();
//$f->addNext(new FinderXML());
$f->addNext(new FinderTXT());

$f->search('laurent');
