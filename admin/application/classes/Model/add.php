<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Add extends Model
{

	public function specialty($cipher, $title_spec)
    {
        return DB::insert('users', array('cipher', 'title_spec'))
            ->values(array($cipher, $title_spec));
    }

    public function view_project($view)
    {
        DB::insert('view', array('view'))
            ->values(array($view))
            ->execute();
    }

}