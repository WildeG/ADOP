<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Select extends Controller {

	public function action_id_user()
	{
		if (!empty($_POST)){
            $id = $_POST['id'];
            $project = Model::factory('select')
                ->project_user($id);
            // $progress = Model::factory('select')
            //     ->progress($id);
            $user = Model::factory('select')
                ->id_user($id);
            $res = View::factory('result/user_id_info')
                // ->bind('progress', $progress)
                ->bind('project', $project)
            	->bind('user', $user);
            $this->response->body($res);
        }
	}

    public function action_users() 
    {   
        $user = Model::factory('select')
            ->user_search($_POST['search']);
        $res = View::factory('result/user')
            ->bind('user', $user);
        $this->response->body($res);
    }

    public function action_specialties() 
    {   
        $user = Model::factory('select')
            ->specialty();
        $res = View::factory('result/user')
            ->bind('user', $user);
        $this->response->body($res);
    }
}