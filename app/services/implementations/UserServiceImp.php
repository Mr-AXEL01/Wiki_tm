<?php

class UserServiceImp implements UserServiceInterface
{
    private $db;
    private $dbh;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function create(User $user)
    {
        if (empty($user->role)) {
            $user->role = 'author';
        }
        
        $stmt = $this->dbh->prepare('INSERT INTO user (fullName, username, pictureUser, email, password, role) 
                          VALUES (:fullName, :username, :pictureUser, :email, :password, :role)');
        $fullName = $user->__get("fullName");
        $username = $user->__get("username");
        $pictureUser = $user->__get("pictureUser");
        $email = $user->__get("email");
        $pass = $user->__get("password");
        $role = $user->__get("role");
        
        $stmt->bindParam(':fullName',$fullName );
        $stmt->bindParam(':username',$username );
        $stmt->bindParam(':pictureUser',$pictureUser );
        $stmt->bindParam(':email',$email );
        $stmt->bindParam(':password',$pass );
        $stmt->bindParam(':role',$role );
        
        
        $stmt->execute();
    }

    public function read()
    {
        $sql = "SELECT * FROM user ORDER BY idUser DESC";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function fetchByEmail(User $user){
        $email = $user->__get("email");
        $pass = $user->__get("password");
        $stmt = $this->dbh->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindParam(':email',$email );
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userInfo = ($stmt->fetch());
            if(password_verify($pass,$userInfo['password'])) {
                if($userInfo['role'] == 'admin'){
                    header('Location:..');
                }else{
                    header('Location:....');
                }
            }else {
                print_r('password incorrect');
            }
        }else {
            redirect('users/login');
        }
        
    }

    public function fetch($idUser)
    {
        $this->db->query('SELECT * FROM user WHERE idUser = :idUser');
        $this->db->bind(':idUser', $idUser);
        return $this->db->single();
    }

    private function bindValues(User $user)
    {
        foreach ($user as $property => $value) {
            die(':' . $property. $value);
            // $this->db->bind(':' . $property, $value);
        }
    }
}
