<?php
require_once(__DIR__ . "/../config/Database.php");

class WikiService
{


    use Database;



    public function addWikis(wiki $wiki)
    {

        $conn = $this->connect();
        $wikiImage = $wiki->getWikiImage();
        $wikiTitle = $wiki->getWikiTitle();
        $wikiContent = $wiki->getWikiContent();
        $wikiSummary = $wiki->getWikiSummarize();
        $wikiCategory = $wiki->getCategoryId();
        $wikiAuthor = $wiki->getAuthorId();
        $query = "INSERT INTO wiki (pictureWiki,titleWiki,contentWiki,summaryWiki,idCategory,idUser) VALUES (:pictureWiki , :titleWiki ,:contentWiki,:summaryWiki,:idCategory,:idUser)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":pictureWiki", $wikiImage);
        $stmt->bindParam(":titleWiki", $wikiTitle);
        $stmt->bindParam(":contentWiki", $wikiContent);
        $stmt->bindParam(":summaryWiki", $wikiSummary);
        $stmt->bindParam(":idCategory", $wikiCategory);
        $stmt->bindParam(":idUser", $wikiAuthor);
        $stmt->execute();
        $id = $conn->lastInsertId();

        return $id;
    }
    public function TagsOfWikis(WikisTags $wikiTgas)
    {
        $conn = $this->connect();
        $wikiId =  $wikiTgas->getWikiId();
        $tagId =  $wikiTgas->getTagId();

        $query = "INSERT INTO tagsofwiki (idWiki,idTag) VALUES (:idWiki , :idTag)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idWiki", $wikiId);
        $stmt->bindParam(":idTag", $tagId);
        $stmt->execute();
    }

    public function CheckWiki($title)
    {
        $conn = $this->connect();
        $query = "SELECT  titleWiki FROM wiki where titleWiki = :titleWiki";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":titleWiki", $title);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getWikis()
    {
        $conn = $this->connect();
        $query = "SELECT wiki.*, tag.nameTag, category.nameCategory , user.fullName
        FROM wiki 
        JOIN tagsofwiki ON wiki.idWiki = tagsofwiki.idWiki
        JOIN tag ON tag.idTag = tagsofwiki.idTag 
        JOIN user On wiki.idUser = user.idUser
        LEFT JOIN category ON wiki.idCategory = category.idCategory
        WHERE archived = '1'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($result as $row) {
            $wikiId = $row["idWiki"];
            if (!isset($wikis[$wikiId])) {
                $wikis[$wikiId] = array(
                    'idWiki' => $wikiId,
                    'pictureWiki' => $row["pictureWiki"],
                    'titleWiki' => $row["titleWiki"],
                    'contentWiki' => $row['contentWiki'],
                    'summaryWiki' => $row["summaryWiki"],
                    'dateCreated' => $row['dateCreated'],
                    'idCategory' => $row["idCategory"],
                    'idUser' => $row['idUser'],
                    'archived' => $row['archived'],
                    'tags' => array(),
                    'category' => $row['nameCategory'],
                    'username' => $row['fullName'],
                );
            }
            $wikis[$wikiId]['tags'][] = $row['nameTag'];
        }
        $wikis = array_values($wikis);
        return $wikis;
    }

    public function getHomeWiki()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM wiki WHERE archived = '1' ORDER BY titleWiki DESC LIMIT 3 ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $Wiki  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($Wiki as $row) {
            $wikis[] =   new wiki($row["idWiki"], $row["pictureWiki"], $row["titleWiki"], $row['contentWiki'], $row["summaryWiki"], $row['dateCreated'], $row["idCategory"], $row['idUser'], $row['archived']);
        }
        return $wikis;
    }

    public function getAuthorWikis($id)
    {

        $conn = $this->connect();
        $query = "SELECT * FROM wiki WHERE archived = '1' AND idUser = :idUser";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idUser", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($result as $row) {
            $wikis[] =   new wiki($row["idWiki"], $row["pictureWiki"], $row["titleWiki"], $row['contentWiki'], $row["summaryWiki"], $row['dateCreated'], $row["idCategory"], $row['idUser'], $row['archived']);
        }
        return $wikis;
    }

    public function displayUpdateWiki($id)
    {
        $conn = $this->connect();
        $query = "SELECT pictureWiki , titleWiki ,  summaryWiki,contentWiki FROM wiki WHERE idWiki = :idWiki";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idWiki", $id);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        $img = $resulte["pictureWiki"];
        $title = $resulte["titleWiki"];
        $summary = $resulte["summaryWiki"];
        $content = $resulte["contentWiki"];

        return [$img, $title, $content, $summary];
    }

    public function updateWiki(wiki $wiki, $id)
    {
        $conn = $this->connect();
        $wikiTitle = $wiki->getWikiTitle();
        $wikiContent = $wiki->getWikiContent();
        $wikiSummary = $wiki->getWikiSummarize();
        $wikiImage = $wiki->getWikiImage();
        $query = 'UPDATE wiki SET pictureWiki =:pictureWiki , titleWiki=:titleWiki ,summaryWiki=:summaryWiki ,  contentWiki=:contentWiki WHERE idWiki = :idWiki';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':titleWiki', $wikiTitle);
        $stmt->bindParam(':summaryWiki', $wikiSummary);
        $stmt->bindParam(':contentWiki', $wikiContent);
        $stmt->bindParam(':pictureWiki', $wikiImage);
        $stmt->bindParam(':idWiki', $id);
        $stmt->execute();
    }

    public function deleteWiki($id)
    {
        $conn = $this->connect();
        $query = "DELETE FROM wiki WHERE idWiki= :idWiki";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idWiki", $id);
        $stmt->execute();
    }

    public function ArchiveWiki($id)
    {
        $conn = $this->connect();
        $query = "UPDATE wiki set archived = '0' WHERE idWiki =:idWiki";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idWiki", $id);
        $stmt->execute();
    }
    public function uNArchiveWiki($id)
    {
        $conn = $this->connect();
        $query = "UPDATE wiki set archived = '1' WHERE idWiki =:idWiki";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idWiki", $id);
        $stmt->execute();
    }


    public function getAdminWikis()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM wiki";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Adminwikis = array();
        foreach ($result as $row) {
            $Adminwikis[] =    new wiki($row["idWiki"], $row["pictureWiki"], $row["titleWiki"], $row['contentWiki'], $row["summaryWiki"], $row['dateCreated'], $row["idCategory"], $row['idUser'], $row['archived']);
        }
        # print_r($Adminwikis);
        # die;
        return $Adminwikis;
    }

    public function CountWikis()
    {
        $conn = $this->connect();
        $query = 'SELECT COUNT(idWiki) as Wikis FROM wiki';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function CountArchivedWikis()
    {
        $conn = $this->connect();
        $query = 'SELECT COUNT(idWiki) as Wikis FROM wiki WHERE archived = "0" ';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function Wiki($id)
    {
        $conn = $this->connect();
        $query = 'SELECT * FROM wiki WHERE idWiki = :idWiki';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idWiki', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) 
        {
            return null;
        }
        $wiki = new wiki($row["idWiki"], $row["pictureWiki"], $row["titleWiki"], $row['contentWiki'], $row["summaryWiki"], $row['dateCreated'], $row["idCategory"], $row['idUser'], $row['archived']);
        $idwiki = $wiki->getId();
        $image = $wiki->getWikiImage();
        $title = $wiki->getWikiTitle();
        $summary = $wiki->getWikiSummarize();
        $content = $wiki->getWikiContent();
        $date  = $wiki->getDate();

        return [$idwiki, $image, $title, $summary, $content, $date];
    }  

    public function searchWikis($search)
    {
        $conn = $this->connect();
        $query = "SELECT wiki.*, tag.nameTag, category.nameCategory, user.fullName
        FROM wiki
        JOIN  tagsofwiki ON wiki.idWiki =  tagsofwiki.idWiki
        JOIN tag ON tag.idTag =  tagsofwiki.idTag
        JOIN user ON wiki.idUser = user.idUser
        LEFT JOIN category ON wiki.idCategory = category.idCategory
        WHERE archived = '1' 
        AND (nameTag LIKE '%{$search}%' OR nameCategory LIKE '%{$search}%' OR titleWiki LIKE '%{$search}%')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($result as $row) {
            $wikiId = $row["idWiki"];
            if (!isset($wikis[$wikiId])) {
                $wikis[$wikiId] = array(
                    'idWiki' => $wikiId,
                    'pictureWiki' => $row["pictureWiki"],
                    'titleWiki' => $row["titleWiki"],
                    'contentWiki' => $row['contentWiki'],
                    'summaryWiki' => $row["summaryWiki"],
                    'dateCreated' => $row['dateCreated'],
                    'idCategory' => $row["idCategory"],
                    'idUser' => $row['idUser'],
                    'archived' => $row['archived'],
                    'tags' => array(),
                    'category' => $row['nameCategory'],
                    'username' => $row['fullName'],
                );
            }
            $wikis[$wikiId]['tags'][] = $row['nameTag'];
        }
        $wikis = array_values($wikis);

        return $wikis;
    }
    
}
