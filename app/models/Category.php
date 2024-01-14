<?php


class Category{

    private $id;
    private $category_name;
    private $category_desc;
    private $category_image;


    public function __construct($id, $category_name, $category_desc, $category_image){
        $this->id = $id;
        $this->category_name = $category_name;
        $this->category_desc = $category_desc;
        $this->category_image = $category_image;
}
public function getId()
{
    return $this->id;
}

public function getCategory_name()
{
    return $this->category_name;
}

public function getCategory_desc()
{
    return $this->category_desc;
}

public function getCategory_image()
{
    return $this->category_image;
}


}

?>