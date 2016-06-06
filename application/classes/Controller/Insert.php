<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_adduser()
	{
		if ($_POST) {
			if (!empty($_POST['inputEmail'])){ $e_mail = $_POST['inputEmail'];}
			if (!empty($_POST['inputPassword'])){ $password = $_POST['inputPassword'];}
			if (!empty($_POST['full_name'])){ $full_name = $_POST['full_name'];}
			if (!empty($_POST['group'])){ $group = $_POST['group'];}
		}
            $add = Model::factory('add')->adduser($full_name, $e_mail, $password, $group);

	}
}