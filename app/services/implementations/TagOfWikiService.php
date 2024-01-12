<?php

class TagOfWikiServiceImp implements TagOfWikiServiceInterface {
    private $db;
    private $dbh;

    public function __construct() 
    {
        $this->db = Database::getInstance();
        $this->dbh = $this->db->getConnection();
    }

    public function create($idTag, $idWiki) 
    {
        $dbh = $this->dbh;
        $sql = "INSERT INTO tagsOfWiki (idTag, idWiki) VALUES (:idTag, :idWiki)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idTag', $idTag, PDO::PARAM_INT);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($idTag, $idWiki) 
    {
        $dbh = $this->dbh;
        $sql = "DELETE FROM tagsOfWiki WHERE idTag = :idTag AND idWiki = :idWiki";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idTag', $idTag, PDO::PARAM_INT);
        $stmt->bindParam(':idWiki', $idWiki, PDO::PARAM_INT);
        return $stmt->execute();
    }
}