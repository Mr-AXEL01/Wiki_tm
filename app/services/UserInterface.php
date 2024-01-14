<?php

interface UserInterface{

    public function addUser(User $user);
    public function getUser();
    public function login($email);
    public function cheking($email);
}

?>