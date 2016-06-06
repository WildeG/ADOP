<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_view_project()
	{
		if (!empty($_POST['view'])){
            $view = $_POST['view'];
            $add = Model::factory('add')->view_project($view);
        	$view = Model::factory('select')
            	->view();
            $res = View::factory('result/view_project')
            	->bind('view', $view);
            $this->response->body($res);
        }
	}

    public function action_user()
    {
        if (!empty($_POST)){
            $full_name = $_POST['full_name'];
            $group = $_POST['group'];
            $password = $_POST['password'];
            $e_mail = $_POST['e_mail'];
            $add = Model::factory('add')
                ->user($full_name, $group, $password, $e_mail);
            $user = Model::factory('select')
                ->user();
            $res = View::factory('result/user')
                ->bind('user', $user);
            $this->response->body($res);
        }
    }



}