<?php

interface TagOfWikiServiceInterface {
    public function create($idTag, $idWiki);
    public function delete($idTag, $idWiki);
    // public function getTagsForWiki($idWiki);
    // public function getWikisForTag($idTag);
}
