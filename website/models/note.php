<?php

class Note
{
    protected $id;
    protected $user_id;
    protected $header;
    protected $note;
    
    public function __construct($user_id) {
        $this->user_id = $user_id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function loadData (array $data) {
        if(array_key_exists("header", $data)) {
            $this->header = htmlspecialchars(trim($data["header"]));
        }
        if(array_key_exists("note", $data)) {
            $this->note = htmlspecialchars(trim($data["note"]));
        }
    }
    
    public function select_all()
    {
        return $GLOBALS['di']->adapter->read("select * from notes where Id_user = ?", [$this->user_id]);
    }
    
    public function select()
    {
        return $GLOBALS['di']->adapter->read("select * from notes where Id = ? and Id_user = ?", [$this->id, $this->user_id]);
    }
    
    public function save()
    {
        if ($this->id) {
            return $this->edit();
        }
        return $this->insert();
    }
    
    protected function insert()
    {
        return $GLOBALS['di']->adapter->write("insert into notes (Id_user, Header, Note) values (?, ?, ?)", [$this->user_id, $this->header, $this->note]);
    }
    
    protected function edit()
    {
        return $GLOBALS['di']->adapter->write("update notes set Header = ?, Note = ? where Id = ? and Id_user = ?", [$this->header, $this->note, $this->id, $this->user_id]);
    }
    
    public function delete()
    {
        return $GLOBALS['di']->adapter->delete("delete from notes where Id = ? and Id_user = ?", [$this->id, $this->user_id]);
    }
}