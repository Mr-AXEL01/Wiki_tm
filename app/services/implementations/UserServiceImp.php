<?php
class UserServiceImp implements UserServiceInterface {

    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    

}