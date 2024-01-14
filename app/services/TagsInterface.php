<?php

interface TagsInterface{

    public function addtags(tag $tags);
    public function getTags();
    public function updateTags(tag $tags,$id);
    public function displayUpdateTags($id);
    public function removetags($id);
    public function CheckTags($name);
  
}

?>