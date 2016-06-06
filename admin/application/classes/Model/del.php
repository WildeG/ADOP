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

    public function specialties($id)
    {
        DB::delete('specialty')
            ->where('cipher', '=', $id)
            ->execute();
    }

}