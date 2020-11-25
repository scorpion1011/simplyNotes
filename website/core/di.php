<?php

class Di {
    
    protected $dictionary = [];
    
    public function __set($name, $value) {
        
        $this->dictionary[$name] = $value;
    }
    
    public function __get($name) {
        
        if (!array_key_exists($name, $this->dictionary)) {
            throw new \RuntimeException('no key exists: ' . $name);
        }
        
        return $this->dictionary[$name];
    }
}