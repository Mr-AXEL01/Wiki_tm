<?php

class UserServiceImp implements UserServiceInterface{
    private $db;
    private $dbh;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function create(Category $category)
    {
        $dbh = $this->dbh;
        $sql = "INSERT INTO category (nameCategory, description, pictureCategory) 
        VALUES (:nameCategory, :description, :pictureCategory)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":nameCategory" => $category->nameCategory,
            ":description" => $category->description,
            ":pictureCategory" => $category->pictureCategory,
        ]);
        $dbh = null;
        $stmt = null;
    }

    public function read()
    {
        $dbh = $this->dbh;
        $sql = "SELECT * FROM category ORDER BY idCategory DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbh =null;
        $stmt = null;
        return $result;
    }

    public function update(Category $category,$idCategory)
    {
        $dbh = $this->dbh;
        $sql = "UPDATE category SET nameCategory=:nameCategory,description=:description WHERE idCategory=:idCategory";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":nameCategory"=> $category->nameCategory,
            ":description"=> $category->description,
            ":idCategory"=>$idCategory
          ]);
        $dbh = null;
        $stmt = null;
    }

    public function delete($idCategory)
    {
        $dbh= $this->dbh;
        $sql = "DELETE FROM category WHERE idCategory=:idCategory";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":idCategory"=>$idCategory
          ]);
        $dbh = null;
        $stmt = null;

    }

    public function getCategory($idCategory)
    {
        $dbh= $this->dbh;
        $sql = "SELECT * FROM category WHERE idCategory=:idCategory";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":idCategory"=>$idCategory
          ]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $dbh = null;
        $stmt = null;
        return $result;
    }
}