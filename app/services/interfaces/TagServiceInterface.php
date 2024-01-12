<?php

interface TagServiceInterface {
    public function read();
    public function create(Tag $tag);
    public function update(Tag $tag, $idTag);
    public function delete($idTag);
    public function getTag($idTag);
    
}