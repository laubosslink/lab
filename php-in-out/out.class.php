<?php 

class out
{
	static public function setCookie($name, $value, $expire, $path=null, $domain=null, $secure=null, $httponly=null)
	{
		if(setcookie($name, $value, $expire, $path, $domain, $secure, $httponly))
		{
			return true;
		} else {
			return false;
		}
	}
}

?>