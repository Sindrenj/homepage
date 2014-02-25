<?php

class Post extends \Phalcon\Mvc\Model {
    
    public $id = 0;
    
    public $headline;
    
    public $content_front;
    
    public $content;
    
    public $createdBy;
    
    public $created;
    
    
    public function initialize()
    {
        $this->belongsTo("id", "User", "id");
    }
    
    public function set($variable, $value) {
        $this->$variable = $value;
    }
    
    public function getAllOrderByNewest() {
        return $this::find( array("order" => "id DESC"));
    }
}