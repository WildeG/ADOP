<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Del extends Model
{

    public function view_project($id)
    {
        DB::delete('view')
            ->where('id_view', '=', $id)
            ->execute();
    }

    public function user($id)
    {
        DB::delete('user')
            ->where('id_user', '=', $id)
            ->execute();
    }

    public function project($id)
    {
        DB::delete('projects')
            ->where('id_projects', '=', $id)
            ->execute();
    }

    public function specialties($id)
    {
        DB::delete('specialty')
            ->where('cipher', '=', $id)
            ->execute();
    }

    public function manager($id)
    {
        DB::delete('manager')
            ->where('id_manager', '=', $id)
            ->execute();
    }

    public function group($id)
    {
        DB::delete('group')
            ->where('id_group', '=', $id)
            ->execute();
    }

    public function topics($id)
    {
        DB::delete('possible_topics')
            ->where('id_theme', '=', $id)
            ->execute();
    }

}