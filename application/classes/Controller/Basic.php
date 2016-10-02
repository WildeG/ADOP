<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Basic extends Controller_Template {

	public $template = 'global/basic';

	public function action_index()
	{
		if(Auth::instance()->logged_in())
		{
			$this->template->styles = array('style', 'home');
			$content = View::factory('home');
			$this->template->title = 'Главная';
		} else {
			$this->redirect('http://diplom.loc/login');
		}
		$this->template->content = $content;
	}
} 