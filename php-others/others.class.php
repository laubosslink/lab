<?php 

class others
{
	static public function getRandom($length=null)
	{
		$string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
	
		if(empty($length))
		{
			$length = 12;
		}
		
		$return = '';
		
		for ($i=0; $i<$length; $i++)
		{
			$return .= substr($string, rand(0, strlen($string)), 1);
		}
		
		return $return;
	}
}

?>