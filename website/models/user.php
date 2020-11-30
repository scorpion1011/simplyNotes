<?php 

class User
{
    protected $login;
    protected $password;
    
    public function loadData (array $data) {
        if(array_key_exists("login", $data)) {
            $this->login = trim($data["login"]);
        }
        if(array_key_exists("password", $data)) {
            $this->password = trim($data["password"]);
        }
    }
    public function select()
    {
        return $GLOBALS['di']->adapter->read("select * from user where Login = ? and Password = ?", [$this->login, $this->hash_password($this->password)]);
    }
    
    public function save()
    {
        $GLOBALS['di']->adapter->write("insert into user (Login, Password) values (?, ?)", [$this->login, $this->hash_password($this->password)]);
        $insertedUser = $GLOBALS['di']->adapter->lastInsertedId();
        return $insertedUser[0];
    }
    
    public function validate () {
        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);
        
        if(!$uppercase || !$lowercase || !$number || strlen($this->password) < 6 || strlen($this->login) < 6) {
            $uppercase                   ?: $_SESSION['error'] .= 'use at least one uppercase<br/>';
            $lowercase                   ?: $_SESSION['error'] .= 'use at least one lowercase<br/>';
            $number                      ?: $_SESSION['error'] .= 'use at least one number<br/>';
            strlen($this->password) >= 6 ?: $_SESSION['error'] .= 'password must have at least 6 symbols<br/>';
            strlen($this->login) >= 6    ?: $_SESSION['error'] .= 'login must have at least 6 symbols<br/>';
            return false;
        }
        
        if (array_key_exists(0, $this->find())) {
            $_SESSION['error'] .= 'login already exists<br/>';
            return false;
        }
        return true;
    }
    
    protected function find() {
        return $GLOBALS['di']->adapter->read("select * from user where Login = ?", [$this->login]);
    }
    
    protected function hash_password () {
        return hash('ripemd160', $this->password);
    }
}