<?php

include('info.php');
define('MYSQLC_LOGS', true);

class mysql extends PDO
{
	const VERSION = '1.1';
	
	static public $DEBUG = false;

	protected $queryCount=0;
	
	public static function version()
	{
		return self::VERSION;
	}
	
	public function __construct()
	{
		if(defined('DEBUG'))
		{
			$this->DEBUG = DEBUG;
		}
	
		self::connect();
		$this->setAttribute(self::ATTR_STATEMENT_CLASS, array('mysqlStat', array($this)));
		
		if(self::$DEBUG)
		{
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
	
	public function __destruct()
	{
		if(MYSQLC_LOGS)
		{
			$this->setLog('mysql.class.php -> PDO::__destruct()', 'queryCount='.$this->queryCount);
		}
	}
	
	public function connect($host=null, $database=null, $username=null, $password=null, $driver_options=null)
	{
		global $BDD;
		
		empty($host) ? $host = $BDD['host'] : null ;
		empty($database) ? $database = $BDD['database'] : null ;
		$dsn = 'mysql:dbname='.$database.';host='.$host;
		
		empty($username) ? $username = $BDD['username'] : null;
		empty($password) ? $password = $BDD['password'] : null;
		
                try
                {
                    parent::__construct($dsn, $username, $password, $driver_options);
                } catch(Exception $e)
                {
                    print_r($e->getMessage());
                    exit();
                }
	}
	
	public function setQueryCount($number=null)
	{
		if(empty($number))
		{
			$number = 1;
		}
		
		$this->queryCount = $this->queryCount + $number;
	}
	
	public function getQueryCount()
	{
		return $this->queryCount;
	}	
	
	public function query($statement) 
	{
        $return = parent::query($statement);
		
		$return ? $this->setQueryCount() : null;
		
		return $return;
    }
	
 	public function exec($statement)
	{
		$return = parent::exec($statement);
		
		$return ? $this->setQueryCount() : null;
		
		return $return;
	} 
	
	public function setLog($link, $description, $time=null)
	{
		if(empty($time))
		{
			$time = date('Y-m-d H:i:s');
		}

		return self::query("INSERT INTO logs(time, ip, link, description) VALUES ('".$time."', '".$_SERVER['REMOTE_ADDR']."', '".$link."', '".$description."')");
	}
	
	public function getLog($ip=null, $linkKeyword=null, $descriptionKeyword=null)
	{
		if(!empty($linkKeyword))
		{
			$reqLink = "link LIKE '%".$linkKeyword."%'";
		}
		
		if(!empty($descriptionKeyword))
		{
			$reqDesc = "description LIKE '%".$descriptionKeyword."%'";
		}
	
		$searchReq = "WHERE ";
	
		if(!empty($ip))
		{
			$searchReq .= "ip='".$ip."' ";
			
			if(!empty($linkKeyword) || !empty($descriptionKeyword))
			{	
				$searchReq .= "AND ";
			}
		} else {
			$ip=null;
		}
	
		if(!empty($linkKeyword) && !empty($descriptionKeyword))
		{
			$searchReq .= $reqLink . " AND " . $reqDesc;
		} elseif(!empty($linkKeyword))
		{
			$searchReq .= $reqLink;
		} elseif(!empty($descriptionKeyword))
		{
			$searchReq .= $reqDesc;
		} else {
			if(empty($ip))
			{
				$searchReq = null;
			}
		}
		
		return self::query("SELECT * FROM logs " . $searchReq);
	}

}

class mysqlStat extends PDOStatement
{
		protected $pdo;
		
		protected function __construct($_pdo)
		{
			$this->pdo = $_pdo;
		}

	    public function execute($query=null) 
        {
			$return = parent::execute($query);
			
			$return ? $this->pdo->setQueryCount() : null;
			
			return $return;
        }
}
/*
//$mysql = new mysql();
$count = $mysql->exec("DELETE FROM test WHERE ID='4'");

//$mysql->setLog('mysql.class.php', 'just a test !');

$ret = $mysql->getLog();

print_r($ret->fetchAll());

print($count . "<br />");
//$mysql->query("INSERT INTO test (ID) VALUES ('1')");
$test = $mysql->prepare("INSERT INTO test (ID) VALUES ('".rand(1, 6)."')");
$test->execute();
//$extract = $mysql->prepare("SELECT * FROM test");
//$extract->execute();

print($mysql->getQueryCount());
 
//$ret = $extract->fetchAll();
//print_r($ret);

$mysql = null;
*/

?>