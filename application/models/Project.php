<?php

class Project extends \Phalcon\Mvc\Model{
    
    public $id;
    
    public $name;
    
    public $description;
    
    public $author;
    
    public $image;
    
    public function set($variable, $value) {
       $this->$variable = $value;
    }
}
