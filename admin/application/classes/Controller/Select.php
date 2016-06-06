<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Select extends Controller {

	public function action_id_user()
	{
		if (!empty($_POST)){
            $id = $_POST['id'];
            $project = Model::factory('select')
                ->project_user($id);
            $user = Model::factory('select')
                ->id_user($id);
            $res = View::factory('result/user_id_info')
                ->bind('project', $project)
            	->bind('user', $user);
            $this->response->body($res);
        }
	}
}