<?php

class Project {
    
    public $id;
    
    public $name;
    
    public $description;
    
    public $author;
    
    public $image;
    
    public function __construct($id, $name, $desc, $author) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->author = $author;
    }
}