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

    public function action_manager()
    {
        if (isset($_POST)){
            $id = $_POST['id'];
            $add = Model::factory('del')
                ->manager($id);
            $view = Model::factory('select')
                ->manager();
            $res = View::factory('result/manager')
                ->bind('mang', $view);
            $this->response->body($res);
        }
    }

    public function action_group()
    {
        if (isset($_POST)){
            $id = $_POST['id'];
            $add = Model::factory('del')
                ->group($id);
            $group = Model::factory('select')
                ->group();
            $res = View::factory('result/group')
                ->bind('group', $group);
            $this->response->body($res);
        }
    }

    public function action_topics()
    {
        if (isset($_POST)){
            $id = $_POST['id'];
            $add = Model::factory('del')
                ->topics($id);
            $topics = Model::factory('select')
                ->topics();
            $res = View::factory('result/topics')
                ->bind('topics', $topics);
            $this->response->body($res);
        }
    }
}