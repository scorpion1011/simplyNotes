<?php

class PdoAdapter {
    protected static $adapter;
    protected $dbh;
    
    protected function __construct($config) {
        // set connection to mysql with my config 
        $dsn = sprintf('mysql:dbname=%s;host=%s', $config['DB_DATABASE'], $config['DB_HOST']);
        $this->dbh = new PDO($dsn, $config['DB_USERNAME'], $config['DB_PASSWORD']);
    }
    
    public static function getAdapter($config) {
        
        if (!PdoAdapter::$adapter) {
            PdoAdapter::$adapter = new PdoAdapter($config);
        }
        return PdoAdapter::$adapter; 
    }
    
    public function read ($query, array $parameters) {
        $sth = $this->dbh->prepare($query);
        $sth->execute($parameters);
        return $sth->fetchAll();
    }
    
    public function write ($query, array $parameters) {
        $sth = $this->dbh->prepare($query);
        $sth->execute($parameters);
        return true;
    }
    
    public function lastInsertedId () {
        $stmt = $this->dbh->query("SELECT LAST_INSERT_ID()");
        return $stmt->fetch();
    }
    
    public function delete ($query, array $parameters) {
        $sth = $this->dbh->prepare($query);
        $sth->execute($parameters);
        return true;
    }
}