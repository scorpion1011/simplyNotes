<?php
require_once 'model.php';

class Note extends Model
{
    
    public function select($user_id)
    {
        return $GLOBALS['di']->adapter->read("select * from Notes where Id_user = ?", [$user_id]);
    }
}