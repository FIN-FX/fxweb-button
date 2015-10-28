<?php
session_start();
class ViewController
{
	public function render($template, $params)
	{
		foreach($params as $key => $val)
			${$key} = $val;
		include_once 'templates/'.$template;
	}
}


function __autoload($data)
{
	include "../protected-button/classes/$data.class.php";
}

$controller = new MainController();

if (!empty($_POST))
{	
	$_SESSION['start_new'] = time();
	$controller->request();
}else{
	$controller->main();
}

