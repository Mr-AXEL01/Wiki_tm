<?php

class UserService implements UserServiceInterface
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create(User $user)
    {
        $this->db->query('INSERT INTO users (fullName, username, pictureUser, email, password, role) 
                          VALUES (:fullName, :username, :pictureUser, :email, :password, :role)');
        $this->bindValues($user);

        return $this->db->execute();
    }

    public function read()
    {
        $sql = "SELECT * FROM users";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function update(User $user)
    {
        $this->db->query('UPDATE users 
                          SET fullName = :fullName, 
                              username = :username, 
                              pictureUser = :pictureUser, 
                              email = :email, 
                              password = :password, 
                              role = :role 
                          WHERE idUser = :idUser');
        $this->bindValues($user);
        $this->db->bind(':idUser', $user->idUser);

        return $this->db->execute();
    }

    public function delete($idUser)
    {
        $this->db->query('DELETE FROM users WHERE idUser = :idUser');
        $this->db->bind(':idUser', $idUser);
        
        return $this->db->execute();
    }

    public function fetch($idUser)
    {
        $this->db->query('SELECT * FROM users WHERE idUser = :idUser');
        $this->db->bind(':idUser', $idUser);
        return $this->db->single();
    }

    private function bindValues(User $user)
    {
        foreach ($user as $property => $value) {
            $this->db->bind(':' . $property, $value);
        }
    }
}
