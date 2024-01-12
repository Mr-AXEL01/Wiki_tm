<?php

interface TagServiceInterface {
    public function read();
    public function create(Tag $tag);
    
}