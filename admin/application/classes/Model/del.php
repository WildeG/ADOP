<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Del extends Model
{

	public function specialty($cipher, $title_spec)
    {
        return DB::insert('users', array('cipher', 'title_spec'))
            ->values(array($cipher, $title_spec));
    }

    public function view_project($id)
    {
        DB::delete('view')
            ->where('id_view', '=', $id)
            ->execute();
    }

}