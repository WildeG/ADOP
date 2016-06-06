<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	public function action_auth()
	{
		if ($_POST) {
			if (!empty($_POST['login'])) { $login = $_POST['login']; } else { $login = "false"; };
			if (!empty($_POST['pass'])) { $pass = $_POST['pass']; } else { $pass = "false"; };
		}
		$res = Model::factory('auth')
			->auth($login, $fpass);
		$content = View::factory('global/auth')
			->bind('res', $res)
		$this->response->body($content);
	}

}