<?php


class WikisTags{

    private $wiki_id;
    private $tag_id;

private $tag_name;


 public function __construct( $wiki_id, $tag_id,$tag_name){

    $this->wiki_id = $wiki_id;
    $this->tag_id = $tag_id;
    $this->tag_name = $tag_name;
 }
 public function getWikiId() {
    return $this->wiki_id;
}
 public function getTagname() {
    return $this->tag_name;
}

public function getTagId() {
    return $this->tag_id;
}


}

?>