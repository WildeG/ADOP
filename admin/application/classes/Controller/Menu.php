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
        $count_m = Model::factory('select')
            ->count('user');
        $total_items = $count_m[0]['count'];
        $pagination = Pagination::factory(array('total_items' => $total_items));
        $offset = $pagination->offset;
        $quantity = $pagination->items_per_page;
        $group = Model::factory('select')
            ->group();
        $user = Model::factory('select')
            ->user($offset, $quantity);
        $content = View::factory('menu/users')
            ->bind('user', $user)
            ->bind('pagination', $pagination)
            ->bind('group', $group);
        $this->template->styles = array('style','menu/users');
        $this->template->title = 'Пользователи';
        $this->template->content = $content;
    }

    public function action_report() // Отчеты
    {   
        $res = Model::factory('select')
            ->report_man();
        foreach ($res as $value) {
            $res1 = Model::factory('select')
                ->report_user($value['manager']);
            foreach ($res1 as $value2) {
                $res2 = Model::factory('select')
                    ->report_project($value2['id_user']);
                foreach ($res2 as $value3) {
                    $report[$value['full_name']][$value2['full_name']][$value3['view']] = $value3['count'];
                }
            }
        }
        $content = View::factory('menu/report')
            ->bind('report', $report);;
        $this->template->styles = array('style','menu/report');
        $this->template->title = 'Отчеты';
        $this->template->content = $content;
    }

    public function action_manager() // Руководители
    {
        $mang = Model::factory('select')
            ->manager();
        foreach ($mang as $value) {
            $res[$value['id_manager']]['id_manager'] = $value['id_manager'];
            $res[$value['id_manager']]['full_name'] = $value['full_name'];
            $pro= Model::factory('select')
                ->count_projects($value['id_manager']);
            $res[$value['id_manager']]['count'] = $pro[0]['count'];
        }
        $content = View::factory('menu/manager')
            ->bind('mang', $res);
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