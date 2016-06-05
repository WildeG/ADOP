<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_filter()
	{
		$search = $full_name = $spec = $group = $view = $manager = $sdate = $podate = $sort = "false";
		if ($_POST) {
			if ($_POST['search'] != 'false') { $search = $_POST['search']; };
			if ($_POST['fullname'] != 'false') { $full_name = $_POST['fullname']; };
			if ($_POST['spec'] != 'false') { $spec = $_POST['spec']; };
			if ($_POST['group'] != 'false') { $group = $_POST['group']; };
			if ($_POST['view'] != 'false') { $view = $_POST['view']; };
			if ($_POST['manager'] != 'false') { $manager = $_POST['manager']; };
			if ($_POST['sdate'] != 'false') { $sdate = $_POST['sdate']; };
			if ($_POST['podate'] != 'false') { $podate = $_POST['podate']; };
			if ($_POST['sort'] != 'false') { $sort = $_POST['sort']; };
		}
		$variable = Model::factory('select')
			->variable($search, $full_name, $spec, $group, $view, $manager, $sdate, $podate, $sort);
		$res = View::factory('filter') ->bind('variable', $variable);
		$this->response->body($res);
	}
}