<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Select extends Model
{

    public function variable($search, $full_name, $spec, $group, $view, $manager, $sdate, $podate)
    {
        $query = DB::select()
            ->from("projects")
            ->where('id_projects', '>=', '0');
        if ($search != 'false') { $query = $query->and_where('title', 'LIKE', '%'.$search.'%'); };
        if ($full_name != 'false') { $query = $query->and_where('full_name', 'LIKE', '%'.$full_name.'%'); };
        if ($spec != 'false') { $query = $query->and_where('cipher', '=', $spec); };
        if ($group != 'false') { $query = $query->and_where('id_group', '=', $group); };
        if ($view != 'false') { $query = $query->and_where('id_view', '=', $view); };
        if ($manager != 'false') { $query = $query->and_where('id_manager', '=', $manager); };
        if ($sdate != 'false') { $query = $query->and_where('date_add', '>=', $sdate.'%'); };
        if ($podate != 'false') { $query = $query->and_where('date_add', '<=', $podate.'%'); };
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

    public function project_user($id)
    {
        $query = DB::select()
            ->from("projects")
            ->where('id_user', '=', $id)
            ->join('view', 'INNER')
            ->on('projects.view', '=', 'view.id_view') 
            ->execute()
            ->as_array();
        return $query;
    }

    public function id_user($id)
    {
        return DB::select()
            ->from("user")
            ->where('id_user', '=', $id)
            ->join('group', 'INNER')
            ->on('user.id_group', '=', 'group.id_group')
            ->join('specialty', 'INNER')
            ->on('group.cipher', '=', 'specialty.cipher')
            ->limit(1)
            ->execute()
            ->as_array();
    }

}