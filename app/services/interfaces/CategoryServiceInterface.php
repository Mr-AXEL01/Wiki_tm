<?php

interface CategoryServiceInterface {
    public function read();
    public function create(Category $category);
    public function update(Category $category, $idCategory);
    public function delete($idCategory);
    public function getCategory($idCategory);
    
}