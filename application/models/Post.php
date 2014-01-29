<?php

class Post extends \Phalcon\Mvc\Model {
    
    protected $id = 0;
    
    protected $headline;
    
    protected $content;
    
    protected $createdBy;
    
    protected $created;
    
    public function set($variable, $value) {
        $this->$variable = $value;
    }
}