<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Select extends Model
{

    public function user_search($search, $filter)
    {
        $query = DB::select()
            ->from("user")
            ->where('id_user', '>=', '0');
        if ($search!="false") {
            $query = $query ->and_where('full_name', 'LIKE', '%'.$search.'%');
        }
        if ($filter!="all") {
            $query = $query ->and_where('active', '=', $filter);
        }
        $query = $query ->join('group', 'INNER')
            ->on('user.id_group', '=', 'group.id_group')
            ->join('specialty', 'INNER')
            ->on('group.cipher', '=', 'specialty.cipher')
            ->order_by("full_name","ASC")
            ->execute();
        return $query;
    }

    public function progress($id)
    {
        return DB::select('progress', array('COUNT(*)', 'count'))
            ->from("progress")
            ->where('id_user', '=', $id)
            ->group_by('progress')
            ->execute();
    }

    public function user()
    {
        return DB::select()
            ->from("user")
            ->join('group', 'INNER')
            ->on('user.id_group', '=', 'group.id_group')
            ->join('specialty', 'INNER')
            ->on('group.cipher', '=', 'specialty.cipher')
            ->order_by("full_name","ASC")
            ->execute();
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
            ->order_by("cipher","DESC")
            ->execute();
    }

    public function manager()
    {
        return DB::select()
            ->from("manager")
            ->order_by("full_name","ASC")
            ->execute();
    }

    public function topics()
    {
        return DB::select()
            ->from("possible_topics")
            ->join('view', 'INNER')
            ->on('possible_topics.view', '=', 'view.id_view')
            ->order_by("title","ASC")
            ->execute();
    }
    
    public function view()
    {
        return DB::select()
            ->from("view")
            ->order_by("id_view","DESC")
            ->execute();
    }

    public function group()
    {
        return DB::select()
            ->from("group")
            ->join('specialty', 'INNER')
            ->on('group.cipher', '=', 'specialty.cipher')
            ->order_by("id_group","DESC")
            ->execute();
    }
}