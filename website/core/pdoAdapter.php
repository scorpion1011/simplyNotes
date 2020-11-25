<?php

class PdoAdapter {
    protected static $adapter;
    
    protected function __construct($config) {
        // set connection to mysql with my config 
        
    }
    
    public static function getAdapter($config) {
        
        if (!PdoAdapter::$adapter) {
            PdoAdapter::$adapter = new PdoAdapter($config);
        }
    }
    
    public function read ($query, array $parameters) {
        // todo
        return [];
    }
    
    public function write ($query, array $parameters) {
        // todo
        return true;
    }
}