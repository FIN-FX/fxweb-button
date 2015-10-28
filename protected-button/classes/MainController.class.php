<?php 
class MainController
{
	public function main()
	{
		$db = new Db();
		$view = new ViewController();
		$er = new ExchangeRate();
		$_SESSION['time_last'] = time();
		$rate = $er->getExchange('USD', 'UAH', 1, 3);
		$counter = round($db->countCourse($rate),4);
		$view->render('main.php', array(
			'counter' => $counter
		));	
	}

	public function request()
	{
		if((int)($_SESSION['start_new']-$_SESSION['time_last']) + 0.5 >= 1.0)
		{
			$db = new Db();
			$er = new ExchangeRate();
			$rate = $er->getExchange('USD', 'UAH', 1, 3);	
			$counter = $db->click($rate);
			echo json_encode($counter);
			$_SESSION['time_last'] = time();
		}
	}
}
