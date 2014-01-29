<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Note-PC
 */
class User extends \Phalcon\Mvc\Model {
    
    protected $id = 0;
    
    protected $firstname;
    
    protected $lastname;
    
    protected $email;
    
    protected $password;
    
    protected $role = 1;
        
    public function get( $variable ) {
        return $this->$variable;
    }
    
    public function setFirstname( $newFirstname ) {
        $this->firstname = $newFirstname;
    }
    
    public function setLastname( $newLastname ) {
        $this->lastname = $newLastname;
    }
    
    public function setEmail( $newEmail ) {
        $this->email = $newEmail;
    }
    
    public function setPassword( $newPassword ) {
        //Check if the length is long enough.:
        
        $this->password = $newPassword;
    }
    
    public function setRole($newRole) {
        $this->role = $newRole;
    }
    
    public function __toString() {
        return $this->firstname .
               $this->lastname .
               $this->email .
               $this->role .
               $this->password;
    }
} 
