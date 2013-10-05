<?php


class template
{
	const VERSION = '1.3';
	
	static public $DEBUG = false;
	public $TPLDIR = 'templates/';
	public $PAGEDIR = '';
	public $WEBDIR = '';
	
	private $template = 'default';
	private $design = 'default';
	private $model = 'default';
	private $css = 'styles';
	private $page;
	private $out;
	
	
	public function version()
	{
		return self::VERSION;
	}
	
	public function __construct($template=null, $defaultTags=true)
	{
		//ext. const.
		if(defined('TPLDIR'))
		{
			$this->TPLDIR = TPLDIR;
		}
		
		if(defined('DEBUG'))
		{
			$this->DEBUG = DEBUG;
		}
	
		if(defined('PAGEDIR'))
		{
			$this->PAGEDIR = PAGEDIR;
		}
		
		if(defined('WEBDIR'))
		{
			$this->WEBDIR = WEBDIR;
		}
	
		//First need to know if it's a different template
		if(!empty($template))
		{ 
			$this->template = $template;
		}
		
		//Second set default template
		$this->setModel();
		
		//Third, include a page page
		if(isset($_GET['page']))
		{
			$this->getPage($_GET['page']);
		}
		
		if($defaultTags)
		{
			$this->getDefaultBeginTags();
		}
	}
	
	public function setModel($model=null, $css=null)
	{
		if(!empty($model))
		{
			$this->model = $model;
		} 
		
		if(!empty($css))
		{
			$this->css = $css;
		}
		
		$model = $this->model.'.html';
		$file = $this->WEBDIR.$this->TPLDIR.$this->template.'/'.$model;
		$this->out = file_get_contents($file);
	}

	public function getPage($page)
	{
		$this->page = $page.'.php';
		include($this->PAGEDIR.$this->page);
	}
	
	public function replace($tag, $value=NULL)
	{
		if(!empty($tag))
		{
			if($this->out = @preg_replace('#\{'.$tag.'\}#si', $value, $this->out))
			{
				return true;
			} else { 
				return false;
			}
		} else {
			return false;
		}
	}	
	
	public function replaceBoucle($tags=NULL, $repeat=1, $tagBoucle=NULL)
	{
		if(!empty($tagBoucle))
		{
			if(preg_match('#\{'.$tagBoucle.'\}(.+)\{/'.$tagBoucle.'\}#si', $this->out, $try))
			{
			$out='';
			$tags = explode(',', $tags);
			$nbrTags = array_keys($tags);
			$nbrTagsM = max($nbrTags);
			
				for($y=1; $y<=$repeat; $y++)
				{			
					//Use original content of {tagBoucle}..{/tagBoucle} to have {tagBoucle$y}...{/tagBoucle$y}
					$skelet = preg_replace('#'.$tagBoucle.'#si', $tagBoucle.'.'.$y, $try[0]);
					
					//Add {tagBoucle$y}...{/tagBoucle$y} to output
					$out .= $skelet;
					
					//Change tags in {tagBoucle$y}...{/tagBoucle$y}
					for($x=0; $x<=$nbrTagsM; $x++)
					{
						$out =	preg_replace("#\{".$tags[$x]."\}#si", '{'.$tags[$x].'.'.$y.'}', $out);
					}
				}
				
			//Change original content of {tagBoucle}{/tagBoucle} by $out to have an output
			$this->out = preg_replace('#\{'.$tagBoucle.'\}(.+)\{/'.$tagBoucle.'\}#si', $out, $this->out);
			
			return true;
			} else {
			return false;
			}
		} elseif(empty($tagBoucle) && !empty($tags))
		{
		$out="";
		$tags = explode(',', $tags);
		$nbrTags = array_keys($tags);
		$nbrTagsM = max($nbrTags);
		
			for($x=0; $x<=$nbrTagsM; $x++)
			{	
				for($y=1; $y<=$repeat; $y++)
				{
					$out .= '{'.$tags[$x].'.'.$y.'}';
				}
			
			$this->out = preg_replace('#\{'.$tags[$x].'\}#si', $out, $this->out);
			}		
		} else {
			
		}
	}
        
        static public function getMessages($array=null)
        {
			if(empty($array))
			{
				$array = $GLOBALS["MSG"];
			}
			
            if(!empty($array))
            {   
                foreach($array as $key => $value)
                {
                    if(empty($value) || self::$DEBUG)
                    {
                        $message .= '[\''.$key.'\'] ';
                    }
                    
                    $message .= '-'.$value.'. <br />';
                }
                
                return $message;
            } else {
                return false;
            }
        }
        
        static public function addMessage($key, $message)
        {   
            if(!empty($key))
            {
				$GLOBALS["MSG"][$key] = $message;

                if($GLOBALS["MSG"][$key] == $message)
                {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }


    public function getDisplay($parse=true, $defaultTags=true)
	{
		if($defaultTags)
		{
			$this->getDefaultEndTags();
		}
		
		if($parse)
		{
			$this->out = preg_replace('/\{(.+)\}/e', '', $this->out);
		}
		
		eval("?>".$this->out);
	}
	
	private function getDefaultEndTags()
	{
		//Custom
	}
	
	private function getDefaultBeginTags()
	{
		$this->replace('TPL_TITLE', 'Website Title !');
		$this->replace('TPL_CSS', $this->TPLDIR.$this->model.'/design/'.$this->design.'/css/'.$this->css.'.css');
		//$this->replace('TPL_CHARSET', CHARSET);
		$this->replace('TOP3', '<a href="?lang=fr"><img src="templates/default/design/default/icones/langs/french.png"></a> <a href="?lang=en"><img src="templates/default/design/default/icones/langs/english.png"></a>');
	}
}

$Init = new template();
//$Init->setModel('default(2)');

$Init->replaceBoucle('MENUCONTENU,TMENU', 5, 'BOUCLEM');
$Init->replace('MENUCONTENU.1', '{TMENU}');
$Init->replace('MENUCONTENU.2', '{TMENU}');
$Init->replaceBoucle('MENUCONTENU.5,TMENU.5', 2, 'BOUCLEM.5');


$Init->replaceBoucle('TCONTENU,CONTENU', 3, 'BOUCLEC');
$Init->replaceBoucle('CONTENU.2', 2);
$Init->replaceBoucle('CONTENU.3', 3);
$Init->replaceBoucle('CONTENU.3.1', 2);
$Init->replace('CONTENU.1', "Hello world");
$Init->getPage('pro');


$array['error1'] = "My firest error";
$array['error2'] = "My second error";

$Init->replace('TMENU.5.1', 'Messages');
$Init->replace('MENUCONTENU.5.1', $Init->getMessages($array));

$Init->getDisplay(false);
?>