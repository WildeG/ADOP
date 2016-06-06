<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Menu extends Controller_Template {

	public $template = 'global/basic';

	public function action_specialties() // Специальности
	{
        $content = View::factory('add_edit/specialties')
            ->bind('spec', $spec);
        $spec = Model::factory('select')
            ->specialty();
		$this->template->styles = array('menu/specialties');
		$this->template->title = 'Специальности';
        $this->template->content = $content;
	}

    public function action_registration() // Регистрация
    {
        $group = Model::factory('select')
            ->group();
        $content = View::factory('menu/registration')
            ->bind('group', $group);
        $this->template->styles = array('menu/registration');
        $this->template->title = 'Регистрация';
        $this->template->content = $content;
    }

    public function action_step_1() // Проекты
    {
        $content = View::factory('menu/register_project/step_1');
        $this->template->title = 'Регистрация проекта';
        $this->template->content = $content;
    }

    public function action_step_2() // Проекты
    {
        $content = View::factory('menu/register_project/step_2');
        $this->template->title = 'Регистрация проекта';
        $this->template->content = $content;
    }

    public function action_group() // Группы
    {
        $content = View::factory('menu/group');
        $this->template->styles = array('menu/group');
        $this->template->title = 'Группы';
        $this->template->content = $content;
    }

    public function action_view_project() // Виды проектов
    {
        $content = View::factory('menu/view_project');
        $this->template->styles = array('menu/view_project');
        $this->template->title = 'Виды проектов';
        $this->template->content = $content;
    }


} // End