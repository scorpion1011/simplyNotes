<?php

class Note extends Model
{
    
    public function select($user_id)
    {
        $GLOBALS['di']->adapter->read("select * from Notes where Id_user = ?", [$user_id]);
    }
}