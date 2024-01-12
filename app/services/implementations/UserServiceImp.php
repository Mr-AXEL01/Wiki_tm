<?php

class UserServiceImp implements UserServiceInterface{
    private $db;
    private $dbh;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function create(User $user)
    {
        $dbh = $this->dbh;
        if (empty($user->role)) {
            $user->role = 'author';
        }
        $sql = "INSERT INTO user (fullName, username, pictureUser, email, password, role) 
        VALUES (:fullName, :username, :pictureUser, :email, :password, :role)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":fullName" => $user->fullName,
            ":username" => $user->username,
            ":pictureUser" => $user->pictureUser,
            ":email" => $user->email,
            ":password" => password_hash($user->password, PASSWORD_DEFAULT),
            ":role" => $user->role
        ]);
        $dbh = null;
        $stmt = null;
    }

    public function read()
    {
        $dbh = $this->dbh;
        $sql = "SELECT * FROM user ORDER BY idUser DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbh =null;
        $stmt = null;
        return $result;
    }

    public function login($email, $password)
{
    $dbh = $this->dbh;
    $query = "SELECT * FROM user WHERE email = :email";
    $results = $dbh->prepare($query);
    $results->execute([":email" => $email]);

    if ($results) {
        $stmt = $results->fetch(PDO::FETCH_OBJ);

        if ($stmt && password_verify($password, $stmt->password)) {
            return $stmt;
        }
    }

    return false;
}


    public function isAuthor($idUser)
    {
        $dbh=$this->dbh;
        $query = "SELECT * FROM user WHERE idUser=:idUser AND role='author'";
        $results = $dbh->prepare($query);
        $results->execute([":idUser"=> $idUser]);
        $results->fetch(PDO::FETCH_OBJ);

        if($results->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // public function fetchByEmail(User $user){
    //     $email = $user->__get("email");
    //     $pass = $user->__get("password");
    //     $stmt = $this->dbh->prepare('SELECT * FROM user WHERE email = :email');
    //     $stmt->bindParam(':email',$email );
    //     $stmt->execute();
    //     if($stmt->rowCount() > 0){
    //         $userInfo = ($stmt->fetch());
    //         if(password_verify($pass,$userInfo['password'])) {
    //             if($userInfo['role'] == 'admin'){
    //                 header('Location:..');
    //             }else{
    //                 header('Location:....');
    //             }
    //         }else {
    //             print_r('password incorrect');
    //         }
    //     }else {
    //         redirect('users/login');
    //     }
        
    // }

    // public function fetch($idUser)
    // {
    //     $this->db->query('SELECT * FROM user WHERE idUser = :idUser');
    //     $this->db->bind(':idUser', $idUser);
    //     return $this->db->single();
    // }

    // private function bindValues(User $user)
    // {
    //     foreach ($user as $property => $value) {
    //         die(':' . $property. $value);
    //         // $this->db->bind(':' . $property, $value);
    //     }
    // }
}
