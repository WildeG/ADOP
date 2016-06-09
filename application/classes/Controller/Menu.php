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
        $logauth = View::factory('global/login');
        $this->template->styles = array('menu/registration');
        $this->template->title = 'Регистрация';
        $this->template->logauth = $logauth;
        $this->template->content = $content;
    }

    public function action_reg_project() // Регистрация проекта
    {
        $manager = Model::factory('select')
            ->manager();
        $logauth = View::factory('global/auth');
        $view = Model::factory('select')
            ->view();
        $content = View::factory('menu/register_project/step_1')
            ->bind('view', $view)
            ->bind('manager', $manager);
        $this->template->logauth = $logauth;
        $this->template->title = 'Регистрация проекта';
        $this->template->content = $content;
    }

    public function action_account() // Личный кабинет
    {
        if (!empty($_GET)){
            $id = $_GET['id'];
            $project = Model::factory('select')
                ->project_user($id);
            // $progress = Model::factory('select')
            //     ->progress($id);
            $user = Model::factory('select')
                ->id_user($id);
            $res = View::factory('menu/page_user')
                // ->bind('progress', $progress)
                ->bind('project', $project)
                ->bind('user', $user);
        }
        $logauth = View::factory('global/auth');
        $this->template->title = 'Регистрация проекта';
        $this->template->logauth = $logauth;
        $this->template->content = $res;
    }

    public function action_view_project() // Виды проектов
    {
        $content = View::factory('menu/view_project');
        $this->template->styles = array('menu/view_project');
        $this->template->title = 'Виды проектов';
        $this->template->content = $content;
    }


} // End