<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Basic extends Controller_Template {

	public $template = 'global/basic';

	public function action_index()
	{
		$search = $full_name = $spec = $group = $view = $manager = $sdate = $podate = $sort = "false";
		if ($_POST) {
			if ($_POST['search'] != 'false') { $search = $_POST['search']; };
			if ($_POST['full_name'] != 'false') { $full_name = $_POST['full_name']; };
			if ($_POST['spec'] != 'false') { $spec = $_POST['spec']; };
			if ($_POST['group'] != 'false') { $group = $_POST['group']; };
			if ($_POST['view'] != 'false') { $view = $_POST['view']; };
			if ($_POST['manager'] != 'false') { $manager = $_POST['manager']; };
			if ($_POST['sdate'] != 'false') { $sdate = $_POST['sdate']; };
			if ($_POST['podate'] != 'false') { $podate = $_POST['podate']; };
			if ($_POST['sort'] != 'false') { $sort = $_POST['sort']; };
		}
		$logauth = View::factory('global/login');
		$this->template->styles = array('home');
		$specialty = Model::factory('select')
			->specialty();
		$variable = Model::factory('select')
			->variable($search, $full_name, $spec, $group, $view, $manager, $sdate, $podate, $sort);
		$view = Model::factory('select')
			->view();
		$group = Model::factory('select')
			->group();
		$manager = Model::factory('select')
            ->manager();
        $res = View::factory('filter') ->bind('variable', $variable); 
		$content = View::factory('home')
			->bind('res', $res)
			->bind('group', $group)
			->bind('manager', $manager)
			->bind('view', $view)
			->bind('specialty', $specialty);
		$this->template->title = 'Учет Проектов Конструкторского Бюро';
		$this->template->logauth = $logauth;
		$this->template->content = $content;
	}
} 