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

}