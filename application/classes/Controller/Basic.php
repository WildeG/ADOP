<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Basic extends Controller_Template {

	public $template = 'global/basic';

	public function action_index()
	{
		$search = "false";
		if ($_POST) {
			if ($_POST['search'] != 'false') { $search = $_POST['search']; };
		}
		$this->template->styles = array('home');
		$specialty = Model::factory('select')
			->specialty();
		$variable = Model::factory('select')
			->variable($search);
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
		$this->template->content = $content;
	}
} 