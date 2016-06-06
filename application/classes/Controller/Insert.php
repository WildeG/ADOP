<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_adduser()
	{
		if ($_POST) {
			$e_mail = $_POST['inputEmail'];
			$password = $_POST['inputPassword'];
			$full_name = $_POST['full_name'];
			$group = $_POST['group'];
			$add = Model::factory('Add')->adduser($full_name, $e_mail, $password, $group);
		}
	}
}