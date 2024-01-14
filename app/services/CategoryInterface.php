<?php

interface CategoryInterface{

    public function addCategory(Category $category);
    public function getCategorys();
    public function updateCategory(Category $category,$id);
    public function displayUpdate($id);
    public function removeCatgory($id);
    public function CheckCat($name);
  
}

?>