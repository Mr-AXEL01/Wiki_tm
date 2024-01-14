<?php


class wiki{

    private $id;
    private $wiki_image;
    private $wiki_title;
    private $wiki_content;
    private $wiki_summarize;
    private $created_at;
    private $category_id;
    private $author_id;
    private $wiki_statut;

    public function __construct($id, $wiki_image, $wiki_title,$wiki_content , $wiki_summarize,$created_at,  $category_id, $author_id, $wiki_statut){  

        $this->id = $id;
        $this->wiki_image = $wiki_image;
        $this->wiki_title = $wiki_title;
        $this->wiki_content = $wiki_content;
        $this->wiki_summarize = $wiki_summarize;
        $this->created_at = $created_at;
        $this->category_id = $category_id;
        $this->author_id = $author_id;
        $this->wiki_statut = $wiki_statut;
          }


          public function getId() {
            return $this->id;
        }
    
        public function getWikiImage() {
            return $this->wiki_image;
        }
      
        public function getDate() {
            return $this->created_at;
        }
    
        public function getWikiTitle() {
            return $this->wiki_title;
        }
    
        public function getWikiContent() {
            return $this->wiki_content;
        }
    
        public function getWikiSummarize() {
            return $this->wiki_summarize;
        }
    
     
    
        public function getCategoryId() {
            return $this->category_id;
        }
    
        public function getAuthorId() {
            return $this->author_id;
        }
    
        public function getWikiStatut() {
            return $this->wiki_statut;
        }
    
}

?>