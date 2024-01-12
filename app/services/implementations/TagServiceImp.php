<?php

class TagServiceImp implements  TagServiceInterface{
    private $db;
    private $dbh;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function create(Tag $Tag)
    {
        $dbh = $this->dbh;
        $sql = "INSERT INTO Tag (nameTag) 
        VALUES (:nameTag)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ":nameTag" => $Tag->nameTag
        ]);
        $dbh = null;
        $stmt = null;
    }

    public function read()
    {
        $dbh = $this->dbh;
        $sql = "SELECT * FROM Tag ORDER BY idTag DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbh =null;
        $stmt = null;
        return $result;
    }

    public function update(Tag $Tag,$idTag)
    {
        $dbh = $this->dbh;
        $sql = "UPDATE Tag SET nameTag=:nameTag WHERE idTag=:idTag";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":nameTag"=> $Tag->nameTag
          ]);
        $dbh = null;
        $stmt = null;
    }

    public function delete($idTag)
    {
        $dbh= $this->dbh;
        $sql = "DELETE FROM Tag WHERE idTag=:idTag";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":idTag"=>$idTag
          ]);
        $dbh = null;
        $stmt = null;

    }

    public function getTag($idTag)
    {
        $dbh= $this->dbh;
        $sql = "SELECT * FROM Tag WHERE idTag=:idTag";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([  
            ":idTag"=>$idTag
          ]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $dbh = null;
        $stmt = null;
        return $result;
    }
}