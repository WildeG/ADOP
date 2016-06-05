<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Project extends Model_Database
{
    static $table_articles = "articles";
    
    /** Выбор записей */
    public function findBy() {
 
        return DB::select()->from(self::$table_articles)->execute()->as_array();
    }
    
    /** Сохранение записи */
    public function save($data){
 
        if(!$data) return false;
        
        foreach($data as $k=>$v){
            $key[] = $k;
            $value[] = $v;
        }
        
        $id = DB::insert(self::$table_articles, $key)->values($value)->execute();
        
        return $id;
    }
    
    /** Удаление записи */
    public function delete($id){
 
        if($id){
            return (bool) DB::delete(self::$table_articles)->where('id', '=', $id)->execute();
            
        }
        
        return false;
    }
}