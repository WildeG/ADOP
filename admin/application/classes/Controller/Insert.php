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

}