<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Menu extends Controller_Template {

	public $template = 'global/basic';

	public function action_specialties() // Специальности
	{
        $content = View::factory('menu/specialties')
            ->bind('spec', $spec);
        $spec = Model::factory('select')
            ->specialty();
		$this->template->styles = array('style','menu/specialties');
		$this->template->title = 'Специальности';
        $this->template->content = $content;
	}

    public function action_users() // Пользователи
    {   
        $group = Model::factory('select')
            ->group();
        $user = Model::factory('select')
            ->user();
        $content = View::factory('menu/users')
            ->bind('user', $user)
            ->bind('group', $group);
        $this->template->styles = array('style','menu/users');
        $this->template->title = 'Пользователи';
        $this->template->content = $content;
    }

    public function action_report() // Отчеты
    {   
        $mang = Model::factory('select')
            ->manager();
        foreach ($mang as $value) {
            // $report[$value['full_name']]=
            $mang = Model::factory('select')
                ->manager();
        }
        $content = View::factory('menu/report')
            ->bind('report', $report);;
        $this->template->styles = array('style','menu/report');
        $this->template->title = 'Отчеты';
        $this->template->content = $content;
    }

    public function action_manager() // Руководители
    {
        $content = View::factory('menu/manager')
            ->bind('mang', $mang);
        $mang = Model::factory('select')
            ->manager();
        $this->template->styles = array('style','menu/manager');
        $this->template->title = 'Руководители';
        $this->template->content = $content;
    }

    public function action_topics() // Возможные темы
    {
        $view = Model::factory('select')
            ->view();
        $topics = Model::factory('select')
            ->topics();
        $content = View::factory('menu/topics')
            ->bind('topics', $topics)
            ->bind('view', $view);
        $this->template->styles = array('style','menu/topics');
        $this->template->title = 'Возможные темы';
        $this->template->content = $content;
    }

    public function action_project() // Проекты
    {
        $search = "false";
        if ($_POST) {
            if ($_POST['search'] != 'false') { $search = $_POST['search']; };
        }
        $variable = Model::factory('select')
            ->variable($search);
        $specialty = Model::factory('select')
            ->specialty();
        $group = Model::factory('select')
            ->group();
        $user = Model::factory('select')
            ->user();
        $manager = Model::factory('select')
            ->manager();
        $view = Model::factory('select')
            ->view();
        $res = View::factory('result/project') 
            ->bind('variable', $variable); 
        $content = View::factory('menu/project')
            ->bind('res', $res)
            ->bind('user', $user)
            ->bind('view', $view)
            ->bind('group', $group)
            ->bind('specialty', $specialty)
            ->bind('manager', $manager);
        $this->template->styles = array('style','menu/project');
        $this->template->title = 'Проекты';
        $this->template->content = $content;
    }

    public function action_group() // Группы 
    {
        $group = Model::factory('select')
            ->group();
        $specialty = Model::factory('select')
            ->specialty();
        $scontent = View::factory('result/group')
            ->bind('group', $group);
        $content = View::factory('menu/group')
            ->bind('content', $scontent)
            ->bind('specialty', $specialty);
        $this->template->styles = array('style','menu/group');
        $this->template->title = 'Группы';
        $this->template->content = $content;
    }

    public function action_view_project() // Виды проектов
    {

        $res = View::factory('result/view_project')
                ->bind('view', $view);
        $content = View::factory('menu/view_project')
            ->bind('table', $res);
        $view = Model::factory('select')
            ->view();
        $this->template->styles = array('style','menu/view_project');
        $this->template->title = 'Виды проектов';
        $this->template->content = $content;
    }


} // End