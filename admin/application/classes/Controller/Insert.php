<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_view_project()
	{
		if (!empty($_POST['view'])){
            $view = $_POST['view'];
            $add = Model::factory('add')
                ->view_project($view);
        	$view = Model::factory('select')
            	->view();
            $res = View::factory('result/view_project')
            	->bind('view', $view);
            $this->response->body($res);
        }
	}

    public function action_project()
    {
        if ($_POST){
            $title = $_POST['title'];
            $discription = $_POST['discription'];
            $subject = $_POST['subject'];
            $user = $_POST['user'];
            $manager = $_POST['manager'];
            $view = $_POST['view'];
            $add = Model::factory('add')
                ->project($title, $discription, $subject, $user, $manager, $view);
            $project = Model::factory('select')
                ->project();
            $res = View::factory('result/project')
                ->bind('variable', $project);
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

    public function action_specialties()
    {
        if (!empty($_POST)){
            $cod = $_POST['cod'];
            $title = $_POST['title'];
            $add = Model::factory('add')
                ->specialties($cod, $title);
            $spec = Model::factory('select')
                ->specialty();
            $res = View::factory('result/specialties')
                ->bind('spec', $spec);
            $this->response->body($res);
        }
    }

    public function action_group()
    {
        if ($_POST){
            $numbgr = $_POST['numbgr'];
            $year = date("Y-m-d", strtotime($_POST['year']));
            $spec = $_POST['spec'];
            $add = Model::factory('add')
                ->group($numbgr, $year, $spec);
            $group = Model::factory('select')
                ->group();
            $res = View::factory('result/group')
                ->bind('group', $group);
            $this->response->body($res);
        }
    }

    public function action_manager()
    {
        if ($_POST) {
            $full_name = $_POST['full_name'];
            $add = Model::factory('Add')
                ->manager($full_name);
            $mang = Model::factory('select')
                ->manager();
            $res = View::factory('result/manager')
                ->bind('mang', $mang);
            $this->response->body($res);
        }
    }

    public function action_topics()
    {
        if ($_POST) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $view = $_POST['view'];
            $add = Model::factory('Add')
                ->topics($title, $description, $view);
            $topics = Model::factory('select')
                ->topics();
            $res = View::factory('result/topics')
                ->bind('topics', $topics);
            $this->response->body($res);
        }
    }

}