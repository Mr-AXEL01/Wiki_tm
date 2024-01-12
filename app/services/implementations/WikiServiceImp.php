<?php

class WikiServiceImp implements WikiServiceInterface {
    private $db;
    private $dbh;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function read() 
    {
        $sql = "SELECT * FROM wiki WHERE archived = '0'";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function readArchived() 
    {
        $sql = "SELECT * FROM wiki WHERE archived = '1'";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function wikisOfAuthor($idUser) 
    {
        $sql = "SELECT * FROM wiki WHERE idUser = :idUser AND archived = '0'";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create(Wiki $wiki) 
    {
        $dbh = $this->dbh;
        $sql = "INSERT INTO wiki (title, content, pictureWiki, dateCreated, dateModified, archived, idCategory, idUser) 
                VALUES (:title, :content, :pictureWiki, NOW(), NOW(), '0', :idCategory, :idUser)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $wiki->title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $wiki->content, PDO::PARAM_STR);
        $stmt->bindParam(':pictureWiki', $wiki->pictureWiki, PDO::PARAM_STR);
        $stmt->bindParam(':idCategory', $wiki->idCategory, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $wiki->idUser, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update(Wiki $wiki) 
    {
        $dbh = $this->dbh;
        $sql = "UPDATE wiki SET title = :title, content = :content, pictureWiki = :pictureWiki, dateModified = NOW(), idCategory = :idCategory 
                WHERE idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $wiki->title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $wiki->content, PDO::PARAM_STR);
        $stmt->bindParam(':pictureWiki', $wiki->pictureWiki, PDO::PARAM_STR);
        $stmt->bindParam(':idCategory', $wiki->idCategory, PDO::PARAM_INT);
        $stmt->bindParam(':idWiki', $wiki->idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($idWiki) 
    {
        $dbh = $this->dbh;
        $sql = "DELETE FROM wiki WHERE idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function softDelete($idWiki) 
    {
        $dbh =$this->dbh;
        $sql = "UPDATE wiki SET archived = '1' WHERE idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function restore($idWiki) 
    {
        $dbh =$this->dbh;
        $sql = "UPDATE wiki SET archived = '0' WHERE idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function fetch($idWiki) 
    {
        $dbh =$this->dbh;
        $sql = "SELECT * FROM wiki WHERE idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getColumns() 
    {
        $dbh =$this->dbh;
        $sql = "SHOW COLUMNS FROM wiki";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
