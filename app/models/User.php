<?php


class User{
    protected $id;
    protected $fullname;
    private $email;
    private $password;

private $role;

public function __construct($id, $fullname, $email, $password ,$role){

        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
}
public function getId()
{
    return $this->id;
}

public function getFullname()
{
    return $this->fullname;
}

public function getEmail()
{
    return $this->email;
}

public function getPassword()
{
    return $this->password;
}

public function getRole()
{
    return $this->role;
}

}

?>