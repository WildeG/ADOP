<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Select extends Controller {

	public function action_filter()
	{
		if ($_POST) {
			if (!empty($_POST['search'])) { $search = $_POST['search']; } else { $search = "false"; };
			if (!empty($_POST['full_name'])) { $full_name = $_POST['full_name']; } else { $full_name = "false"; };
			if (!empty($_POST['spec'])) { $spec = $_POST['spec']; } else { $spec = "false"; };
			if (!empty($_POST['group'])) { $group = $_POST['group']; } else { $group = "false"; };
			if (!empty($_POST['view'])) { $view = $_POST['view']; } else { $view = "false"; };
			if (!empty($_POST['manager'])) { $manager = $_POST['manager']; } else { $manager = "false"; };
			if (!empty($_POST['sdate'])) { $sdate = $_POST['sdate']; } else { $sdate = "false"; };
			if (!empty($_POST['podate'])) { $podate = $_POST['podate']; } else { $podate = "false"; };
			if (!empty($_POST['sort'])) { $sort = $_POST['sort']; } else { $sort = "Nomer"; };
		}
		$variable = Model::factory('select')
			->variable($search, $full_name, $spec, $group, $view, $manager, $sdate, $podate, $sort);
		$res = View::factory('filter') ->bind('variable', $variable);
		$this->response->body($res);
	}
}