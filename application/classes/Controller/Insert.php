<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_filter()
	{
		$search = $full_name = $spec = $group = $view = $manager = $sdate = $podate = "false";
		if ($_POST) {
			if ($_POST['search'] != 'false') { $search = $_POST['search']; };
			if ($_POST['full_name'] != 'false') { $full_name = $_POST['full_name']; };
			if ($_POST['spec'] != 'false') { $spec = $_POST['spec']; };
			if ($_POST['group'] != 'false') { $group = $_POST['group']; };
			if ($_POST['view'] != 'false') { $view = $_POST['view']; };
			if ($_POST['manager'] != 'false') { $manager = $_POST['manager']; };
			if ($_POST['sdate'] != 'false') { $sdate = $_POST['sdate']; };
			if ($_POST['podate'] != 'false') { $podate = $_POST['podate']; };
		}
		$variable = Model::factory('select')
			->variable($search, $full_name, $spec, $group, $view, $manager, $sdate, $podate);
		$res = View::factory('filter') ->bind('variable', $variable);
		$this->response->body($res);
	}
}