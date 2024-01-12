<?php

class User {
    private $idWiki;
    private $title; 
    private $content; 
    private $pictureWiki; 
    private $dateCreated; 
    private $archived; 
    private $idCategory;
    private $idUser;

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