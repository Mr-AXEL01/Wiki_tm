<?php

interface UserServiceInterface
{
    public function create(User $user);
    public function read();
    public function update(User $user);
    public function delete($idUser);
    public function fetch($idUser);
}

?>