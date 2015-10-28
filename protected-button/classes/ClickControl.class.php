<?php

class ClickControl
{
	public function control()
	{
		if(isset($_SESSION[telecod_ip]))
		{
			$t = (int)time();
			$t = $t - $_SESSION[telecod_ip];
			if($t < 2)
			{
				return true;
			}
		}
		return false;

	}

	public function initTimer()
	{
		session_start();
		session_save_path("../protected-button/log/session");
		$_SESSION[telecod_ip] = (int)time();
	}
}
