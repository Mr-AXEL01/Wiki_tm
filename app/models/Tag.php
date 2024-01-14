<?php


class Tag{

    private $id;
    private $tag_name;



    public function __construct( $id,  $tag_name){
    $this->id = $id;
    $this->tag_name = $tag_name;
        
    }
    public function getId()
    {
        return $this->id;
    }
    
    public function getTag_name()
    {
        return $this->tag_name;
    }
}

?>