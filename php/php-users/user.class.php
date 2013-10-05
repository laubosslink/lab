<?php

include('../php-sql/mysql.class.php');
include('../php-in-out/in.class.php');
include('../php-in-out/out.class.php');
include('../php-lang/lang.class.php');
include('../php-others/others.class.php');

class user {

	const VERSION = '1.0';
	
	static public $DEBUG = false;
    
    public function __construct() {
        return true;
    }
    
    static public function getConnection($user, $password)
    {
        if(!empty($user) && !empty($password))
		{
			$bdd = new mysql();
			$Qconnect = $bdd->prepare("SELECT password FROM user WHERE user=:user");
			$Qconnect->bindParam(':user', $user, PDO::PARAM_STR);
			$Qconnect->execute();
			
			$connect = $Qconnect->fetch();
			$Qconnect->closeCursor();
			
			$bddPassword = $connect['password'];
			
			if($bddPassword == md5($password))
			{
				$newSession = others::getRandom();
				$newV = others::getRandom(30);

				$Qupdate = $bdd->prepare("UPDATE user SET session=:new_session, password_tmp=:new_v, last_here=:new_here WHERE user=:user");
				$Qupdate->bindParam(':new_session', $newSession, PDO::PARAM_STR);
				$Qupdate->bindParam(':new_v', md5($newV), PDO::PARAM_STR);
				$Qupdate->bindParam(':new_here', time(), PDO::PARAM_STR);
				$Qupdate->bindParam(':user', $user, PDO::PARAM_STR);
				$Qupdate->execute();
				$Qupdate->closeCursor();

				out::setCookie('session', $newSession, time()+60*60);
				out::setCookie('v', $newV, time()+60*60);
				
				//$GLOBALS["MSG"]['getConnection'] = lang::getString('_Success_connection');
				
				return true;
			} else {
				//$GLOBALS["MSG"]['getConnection'] = lang::getString('_Bad_user_password');
				return false;
			}
		} else {
			//$GLOBALS["MSG"]['getConnection'] = lang::getString('_Empty_string');
			return false;
		}
    }
    
    static public function getStatus()
    {
        if(in::getCookie('session') && in::getCookie('v'))
        {
            $bdd = new mysql();
            $Qsession = $bdd->prepare("SELECT session,password_tmp,last_here FROM user WHERE session=:session");
            $Qsession->bindParam(':session', in::getCookie('session'), PDO::PARAM_STR);
            $Qsession->execute();
            
            $session = $Qsession->fetch();
            $Qsession->closeCursor();
			
            $tmpPassword = $session['password_tmp'];
            $lastHere = $session['last_here'];
            $session = $session['session'];
			
            if(in::getCookie('session') == $session && md5(in::getCookie('v')) == $tmpPassword)
            {
                if($lastHere >= time()-60*30)
                {
                    return true;
                } else {
                    self::getLogout();
                    return false;
                }
            } else {
                self::getLogout();
                return false;
            }
        } else {
           return false; 
        }
    }
    
    static public function reqConnection()
    {
        if(self::getStatus())
		{
			return true;
		} else {
			exit();
		}
    }
    
    public static function getLogout()
    {
		$returnS = out::setCookie('session', '', time()+0);
		$returnV = out::setCookie('v', '', time()+0);
		
        if($returnS || $returnV)
        {
            return true;
        } else {
            return false;
        }
    }
}

//user::getConnection('test', 'test');


if(user::getStatus())
{
	print "YES !";
} else	{
	print "NO";
}

?>
