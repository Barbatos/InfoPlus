<?php
/**
 * Class that allows you to route all pages on the website
 *
 * @copyright Copyright (c) InfoPlus 2014
 * @package infoplus
 * @author Charles "Barbatos" Duprey <cduprey@f1m.fr>
 */

class Routing
{
	static private $module;
	
	static private $action;
	
	static private $config = array(
		'default_module' => 'index',
		'default_action' => 'index',
		'segment_module' => 'page',
		'segment_action' => 'act',
		'segment_index' => 'index',
	);
	
	static public function Config($config)
	{
		foreach($config as $key=>$value)
		{
			self::$config[$key] = $value;
		}
	}
	
	static public function Dispatch()
	{
		if(!empty($_GET[self::$config['segment_module']]))
		{
			self::$module = $_GET[self::$config['segment_module']];
			
			if(!empty($_GET[self::$config['segment_index']]) && !strpos($_SERVER['REQUEST_URI'], '?'))
			{
				header("HTTP/1.1 301 Moved Permanently");
				header('location: /'.self::$module.'/');
				exit();
			}
			
			if(!empty($_GET[self::$config['segment_action']]))
			{
				self::$action = $_GET[self::$config['segment_action']];
			}
			else
			{
				self::$action = self::$config['default_action'];
			}
		}
		
		else
		{
			self::$module = self::$config['default_module'];
			self::$action = self::$config['default_action'];
		}
		
		self::$action = str_replace('-', '_', self::$action);
	}
	
	static public function GetModule()
	{
		return self::$module;
	}
	
	static public function GetAction()
	{
		return self::$action;
	}
	
	static public function CheckURL($titre)
	{
		if(isset($_GET['titre']) && (empty($_GET['titre']) OR $_GET['titre'] !== '-'.rewrite($titre))
		&& !(isset($_GET['id2']) && $_GET['id2'].$_GET['titre'] == rewrite($titre)))
		{
				if (empty($_GET['p']) OR (is_numeric($_GET['p']) AND intval($_GET['p']) === 1))
				{
					header("HTTP/1.1 301 Moved Permanently");
					header('location: '.self::$action.'-'.$_GET['id'].'-'.rewrite($titre).'.html');
					exit();
				}
				elseif (!empty($_GET['p']) AND is_numeric($_GET['p']))
				{
					header("HTTP/1.1 301 Moved Permanently");
					header('location: '.self::$action.'-'.$_GET['id'].'-p'.$_GET['p'].'-'.rewrite($titre).'.html');
					exit();		
				}	
		}
		elseif (!empty($_GET['p']) && intval($_GET['p']) === 1)
		{
			if(!empty($_GET['id2']) && is_numeric($_GET['id2']) && $_GET['id2'].$_GET['titre'] != rewrite($titre))
			{
				header("HTTP/1.1 301 Moved Permanently");
				header('location: '.self::$action.'-'.$_GET['id'].'-'.$_GET['id2'].'-'.rewrite($titre).'.html');
				exit();
			}
			else
			{
				header("HTTP/1.1 301 Moved Permanently");
				header('location: '.self::$action.'-'.$_GET['id'].'-'.rewrite($titre).'.html');
				exit();
			}
		}
		
		if(!empty($_GET['titre']) && $_GET['titre'] !== '-'.rewrite($titre))
		$_GET['id2'] = NULL; 
	}
}
?>
