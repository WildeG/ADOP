<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	public function action_auth()
	{
		if ($_POST) {
			if (empty($_POST['login'])) { $login = $_POST['login']; } else { $login = "false"; };
			if (empty($_POST['pass'])) { $pass = md5(md5($_POST['pass'])); } else { $pass = "false"; };
			$bg = Model::factory('auth')
				->auth($login, $pass);
			if (isset($bg[0]['id_user'])) {
				$bg = "<script> (function () {alert('Ошибка входа'); }()); </script>"; 
			} else {
				$session = Session::instance();
				$session->set('username', $bg[0]['full_name']);
				$session->set('id_user', $bg[0]['id_user']);
			}
			$content = View::factory('global/auth')
				->bind('bg', $bg);
			
			$this->response->body($content);
		}
	}

}