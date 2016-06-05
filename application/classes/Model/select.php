<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Select extends Model
{

    public function variable($search)
    {
        $query = DB::select()
            ->from("projects")
            ->where('id_projects', '>=', '0');
        if ($search != 'false') { $query = $query->and_where('title', 'LIKE', '%'.$search.'%'); };
        $query = $query ->order_by("date_add","DESC")
            ->join('view', 'INNER')
            ->on('projects.view', '=', 'view.id_view') 
            ->join('user', 'INNER')
            ->on('projects.id_user', '=', 'user.id_user')
            ->join('group', 'INNER')
            ->on('user.id_group', '=', 'group.id_group')
            ->execute();
        return $query;
    }

    public function specialty()
    {
        return DB::select()
            ->from("specialty")
            ->order_by("title_spec","DESC")
            ->execute()
            ->as_array();
    }

    public function view()
    {
        return DB::select()
            ->from("view")
            ->order_by("view","DESC")
            ->execute()
            ->as_array();
    }

    public function manager()
    {
        return DB::select()
            ->from("manager")
            ->order_by("full_name","DESC")
            ->execute()
            ->as_array();
    }

    public function group()
    {
        return DB::select()
            ->from("group")
            ->order_by("group","DESC")
            ->execute()
            ->as_array();
    }

}