<?php

class User {
    private $idUser;
    private $fullName; 
    private $username; 
    private $pictureUser; 
    private $email; 
    private $password; 
    private $role;

    public function __construct() {

    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this->$property;
    }
}