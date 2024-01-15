<?php
require_once("UserInterface.php");
require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/../config/Database.php");

class UserService implements UserInterface
{
    use Database;

    public function adduser(User $user)
{
    $conn = $this->connect();
    $fullname = $user->getFullName();
    $email = $user->getEmail();
    $password = $user->getPassword();
    $role = $user->getRole();
    // echo '<pre>';
    // print_r($user);
    // die();
   
        $insertQuery = "INSERT INTO user (fullName, email, password, role) VALUES (:fullName, :email, :password, :role)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":fullName", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    
}

public function cheking($email){
    $conn = $this->connect();

    $query = "SELECT email FROM user WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $emails  = $stmt->fetch(PDO::FETCH_ASSOC);
return $emails;

}
    public function getUser()
    {
        $conn =  $this->connect();
        $query = "SELECT * FROM user WHERE role = 'author'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
       $users = array();
       foreach ($result as $row) {
        

        $users[] = new User($row['idUser'],$row['fullName'],$row['email'],$row['password'],$row['role']);
    }
return $users;
}


    public function login($email)
    {
        $conn = $this->connect();

        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $loged  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $loged;
    }

public function CountAUthors(){

    $conn = $this->connect();
    $query = "SELECT count(idUser) as authors FROM user WHERE role = 'author'
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
   $authorsCount = $stmt->fetchColumn();

   return $authorsCount;
}


  
}
