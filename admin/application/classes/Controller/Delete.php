<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Delete extends Controller {

	public function action_view_project()
	{
		if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $add = Model::factory('del')->view_project($id);
        	$view = Model::factory('select')
            	->view();
            $res = View::factory('result/view_project')
            	->bind('view', $view);
            $this->response->body($res);
        }
	}

    public function action_user()
    {
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $add = Model::factory('del')->user($id);
            $user = Model::factory('select')
                ->user();
            $res = View::factory('result/user')
                ->bind('user', $user);
            $this->response->body($res);
        }
    }

    public function action_specialties()
    {
        if (isset($_POST)){
            $id = $_POST['id'];
            $add = Model::factory('del')
                ->specialties($id);
            $view = Model::factory('select')
                ->specialty();
            $res = View::factory('result/specialties')
                ->bind('spec', $view);
            $this->response->body($res);
        }
    }

}