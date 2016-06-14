<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	public function action_auth()
	{
		if ($_POST) {
			if (!empty($_POST['login'])) { $login = $_POST['login']; } else { $login = "false"; };
			if (!empty($_POST['pass'])) { $pass = md5(md5($_POST['pass'])); } else { $pass = "false"; };
			$res = Model::factory('auth')
				->auth($login, $pass);
			$content = View::factory('global/auth')
				->bind('res', $res);
			// setcookie("username", $res['0']['full_name']);
			$this->response->body($content);
		}
	}

}