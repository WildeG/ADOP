<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller {

	public function action_filter()
	{
		$search = $family = $name = $lastname = $spec = $group = $view = $manager = $sdate = $podate = $sort = "false";
		if ($_POST) {
			if ($_POST['search'] != 'false') { $search = $_POST['search']; };
			if ($_POST['family'] != 'false') { $family = $_POST['family']; };
			if ($_POST['name'] != 'false') { $name = $_POST['name']; };
			if ($_POST['lastname'] != 'false') { $lastname = $_POST['lastname']; };
			if ($_POST['spec'] != 'false') { $spec = $_POST['spec']; };
			if ($_POST['group'] != 'false') { $group = $_POST['group']; };
			if ($_POST['view'] != 'false') { $view = $_POST['view']; };
			if ($_POST['manager'] != 'false') { $manager = $_POST['manager']; };
			if ($_POST['sdate'] != 'false') { $sdate = $_POST['sdate']; };
			if ($_POST['podate'] != 'false') { $podate = $_POST['podate']; };
			if ($_POST['sort'] != 'false') { $sort = $_POST['sort']; };
		}
		$variable = Model::factory('select')
			->variable($search, $family, $name, $lastname, $spec, $group, $view, $manager, $sdate, $podate, $sort);
		$res = View::factory('filter') ->bind('variable', $variable);
		$this->response->body($res);
	}
}