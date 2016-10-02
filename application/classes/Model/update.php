<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Update extends Model
{
    public function user($id)
    {
        DB::update('user')
            ->set(array('active' => 1))
            ->where('id_user', '=', $id)
            ->execute();
    }

}