<?php
require_once("TagsInterface.php");
require_once(__DIR__ . "/../models/Tag.php");
require_once(__DIR__ . "/../config/Database.php");

class TagsService implements TagsInterface
{
    use Database;


    public function addtags(tag $tag)
    {
        $conn = $this->connect();
        $tag_name = $tag->getTag_name();



        $insertQuery = "INSERT INTO tag (nameTag) VALUES (:nameTag)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":nameTag", $tag_name);


        $stmt->execute();
    }
    public function getTags()
    {

        $conn = $this->connect();

        $query = "SELECT * FROM tag";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $tags  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tag = array();
        foreach ($tags as $row) {
            $tag[] = new tag($row['idTag'], $row['nameTag'],);
        }
        return $tag;
    }

    public function CheckTags($tags)
    {
        $conn = $this->connect();

        $query = "SELECT nameTag FROM tag WHERE nameTag = :nameTag";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nameTag", $tags);
        $stmt->execute();
        $tags  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tags;
    }

    public function displayUpdateTags($id)
    {
        $conn = $this->connect();
        $query = "SELECT  nameTag FROM tag WHERE idTag = :idTag";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idTag", $id);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $resulte["nameTag"];


        return [$name];
    }



    public function updateTags(tag $tag, $id)
    {

        $conn = $this->connect();
        $Tag_name = $tag->getTag_name();

        $query = "UPDATE tag SET nameTag=:nameTag WHERE idTag =:idTag";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idTag", $id);
        $stmt->bindParam(":nameTag", $Tag_name);

        $stmt->execute();
    }




    public function removetags($id)
    {
        $conn = $this->connect();
        $query = "DELETE FROM tag WHERE idTag = :idTag";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idTag", $id);
        $stmt->execute();
    }
    public function CountTags()
    {

        $conn = $this->connect();
        $query = "SELECT count(idTag) as Tags FROM tag ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $tagsCount = $stmt->fetchColumn();

        return $tagsCount;
    }


  
}
