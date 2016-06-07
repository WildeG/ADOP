<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_adduser()
	{
		if ($_POST) {
			$e_mail = $_POST['inputEmail'];
			$password = md5(md5(trim($_POST['inputPassword'])));
			$full_name = $_POST['full_name'];
			$group = $_POST['group'];
			$add = Model::factory('Add')->adduser($full_name, $e_mail, $password, $group);
			$this->redirect('http://diplom.loc/');
		}
	}

	public function action_manager()
	{
		if ($_POST) {
			$full_name = $_POST['full_name'];
			$add = Model::factory('Add')->manager($full_name);
		}
	}
}