<?php

class Note
{
    
    public function select_all($user_id)
    {
        return $GLOBALS['di']->adapter->read("select * from Notes where Id_user = ?", [$user_id]);
    }
    
    public function select($id)
    {
        return $GLOBALS['di']->adapter->read("select * from Notes where Id = ?", [$id]);
    }
    
    public function save($user_id, $header, $note)
    {
        return $GLOBALS['di']->adapter->write("insert into Notes (Id_user, Header, Note) values (?, ?, ?)", [$user_id, $header, $note]);
    }
    
    public function edit($id, $header, $note)
    {
        return $GLOBALS['di']->adapter->write("update Notes set Header = ?, Note = ? where Id = ?", [$header, $note, $id]);
    }
    
    public function delete($id)
    {
        return $GLOBALS['di']->adapter->delete("delete from Notes where Id = ?", [$id]);
    }
}