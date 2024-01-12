<?php

interface CategoryServiceInterface {
    public function read();
    public function create(Category $category);
    
}