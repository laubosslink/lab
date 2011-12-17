<?php 

class in
{
	public static function getCookie($name)
	{
		if(isset($_COOKIE[$name]))
		{
			return $_COOKIE[$name];
		} else {
			return false;
		}
	}
	
	public static function getGet($name)
	{
		if(isset($_GET[$name]))
		{
			return $_GET[$name];
		} else {
			return false;
		}
	}
        
        static public function getPost($name)
        {
            if(isset($_POST[$name]))
            {
                return $_POST[$name];
            } else {
                return false;
            }
        }
}

?>