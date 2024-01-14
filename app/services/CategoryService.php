<?php
require_once("CategoryInterface.php");
require_once(__DIR__ . "/../models/Category.php");
require_once(__DIR__ . "/../config/Database.php");

class CategoryService implements CategoryInterface
{
    use Database;


    public function addCategory(Category $category)
    {
        $conn = $this->connect();
        $Cat_name = $category->getCategory_name();
        $Cat_description = $category->getCategory_desc();
        $Cat_image = $category->getCategory_image();


        $insertQuery = "INSERT INTO category (nameCategory, description, pictureCategory) VALUES (:nameCategory, :description, :pictureCategory)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":nameCategory", $Cat_name);
        $stmt->bindParam(":description", $Cat_description);
        $stmt->bindParam(":pictureCategory", $Cat_image);

        $stmt->execute();
    }
    public function getCategorys()
    {

        $conn = $this->connect();

        $query = "SELECT * FROM category";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $categorys  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Category = array();
        foreach ($categorys as $cat) {
            $Category[] = new Category($cat['idCategory'], $cat['nameCategory'], $cat['description'], $cat['pictureCategory']);
        }
        return $Category;
    }
    public function getHomeCategorys()
    {

        $conn = $this->connect();

        $query = "SELECT * FROM category ORDER BY nameCategory DESC LIMIT 3";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $categorys  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Category = array();
        foreach ($categorys as $cat) {
            $Category[] = new Category($cat['idCategory'], $cat['nameCategory'], $cat['description'], $cat['pictureCategory']);
        }
        return $Category;
    }

    public function CheckCat($name)
    {
        $conn = $this->connect();

        $query = "SELECT nameCategory FROM category WHERE nameCategory = :nameCategory";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nameCategory", $name);
        $stmt->execute();
        $names  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $names;
    }

    public function displayUpdate($id)
    {
        $conn = $this->connect();
        $query = "SELECT nameCategory , description ,  pictureCategory FROM category WHERE idCategory = :idCategory";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idCategory", $id);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $resulte["nameCategory"];
        $desc = $resulte["description"];
        $img = $resulte["pictureCategory"];

        return [$name, $desc, $img];
    }



    public function updateCategory(Category $category, $id)
    {

        $conn = $this->connect();
        $Cat_name = $category->getCategory_name();
        $Cat_description = $category->getCategory_desc();
        $Cat_image = $category->getCategory_image();
        $query = "UPDATE category SET nameCategory=:nameCategory , description=:description , pictureCategory=:pictureCategory WHERE idCategory =:idCategory";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idCategory", $id);
        $stmt->bindParam(":nameCategory", $Cat_name);
        $stmt->bindParam(":description", $Cat_description);
        $stmt->bindParam(":pictureCategory", $Cat_image);
        $stmt->execute();
    }




    public function removeCatgory($id)
    {
        $conn = $this->connect();
        $query ="DELETE FROM category WHERE idCategory = :idCategory";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":idCategory", $id);
        $stmt->execute();
    }

    public function CountCatgorys(){

        $conn = $this->connect();
        $query = "SELECT count(idCategory) as categorys FROM category ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       $CategorysCount = $stmt->fetchColumn();
    
       return $CategorysCount;
    }
}
