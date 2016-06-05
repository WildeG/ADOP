<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Insert extends Controller_Template {

	public $template = 'global/basic';

	public function action_job()
	{
		$post = Validation::factory($_POST);
		$post -> rule('position', 'not_empty')
			  -> rule('requirements', 'not_empty')
			  -> rule('conditions', 'not_empty')
			  -> rule('support', 'not_empty');
		if ($post -> check()) {
			$pos = Arr::get($_POST, 'position');
			$req = Arr::get($_POST, 'requirements');
			$con = Arr::get($_POST, 'conditions');
			$sup = Arr::get($_POST, 'support');
			$messege = "Вакансия сохранена";
			$id = Model::factory('insert')->create_respondents($pos, $req, $con, $sup);
			$content->type = "done";
		} else {
			$messege = $post -> errors('comments');
			$content->type = "error";
		}
	}

	public function action_add_view()
	{
		if (!empty($_POST['view'])){
            $add=Model::factory('add')->view($_POST);
        } else { break; }
	}

}