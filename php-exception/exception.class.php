<?php

class tryit
{
	public function display()
	{
		throw new Exception("Message Error ", 1520);
	}
}

$try = new tryit();

try
{
	$try->display();
} catch(Exception $e)
{
	echo $e->getMessage();
	echo $e->getCode();
	
	echo "<br /><br />";
	echo $e;
}
?>