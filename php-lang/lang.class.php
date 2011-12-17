<?php 

/*
Constantes : 
LANGC_DEBUGCHARSET (debug charset, for correct screen on website ?)
LANGC_CHARSET (charset website)
LANGC_LANGCHARSET (define in lang file, ex: fr.php)
*/

class lang
{
	const defaultLang='fr';

	private static $lang;
	private static $strings;
	
	private static function defineLang()
	{
		$cookieLang = in::getCookie('lang');
		$getLang = in::getGet('lang');
			
		if(!empty($getLang))
		{
			self::$lang = in::getGet('lang');
			out::setCookie('lang', self::$lang, time()+60*60);
		} elseif(!empty($cookieLang))
		{
			self::$lang = in::getCookie('lang');
		} else {
			self::$lang = self::defaultLang;
		}
		
		if(!@include_once('includes/langs/'.self::$lang.'.php'))
		{
			//throw new Exception('includes/langs/'.self::$lang.'.php doesnt exist.');
			@include_once('includes/langs/'.self::defaultLang.'.php');
		}
		
		if(LANGC_DEBUGCHARSET)
		{
			if(LANGC_LANGCHARSET == 'iso-8859-1' && LANGC_CHARSET == 'utf-8')
			{
				$sort = null;
			
				foreach($STRING as $key => $value)
				{
					$sort[$key] = utf8_encode($STRING[$key]);
				}
				
				$STRING = $sort;
				
			} elseif(LANGC_LANGCHARSET == 'utf-8' && LANGC_CHARSET == 'iso-8859-1')
			{
				$sort = null;
				
				foreach($STRING as $key => $value)
				{
					$sort[$key] = utf8_decode($STRING[$key]);
				}
				
				$STRING = $sort;
			}
		}
		
		self::$strings = $STRING;
		
	}
	
	public static function getLang()
	{
		if(empty(self::$lang))
		{
			self::defineLang();
		}
		
		return self::$lang;
	}
	
	public static function getString($string=null)
	{
		if(empty($string))
		{
			$string = "hello_world";
		}
		
		//defines self::$string
		self::getLang();
		
		if(isset(self::$strings[$string]))
		{
			return self::$strings[$string];
		} else {
			if(DEBUG)
			{
				return 'empty self::$strings['.$string.']';
			} else {
				return false;
			}
		}
	}
}


?>