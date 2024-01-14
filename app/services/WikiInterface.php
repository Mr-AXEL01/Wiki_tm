<?php

interface WikiInterface
{

    public function addWikis(wiki $wiki);
    public function TagsOfWikis(WikisTags $wikiTgas);
    public function getWikis();
    public function updateWiki(wiki $wiki, $id);
    public function displayUpdateWiki($id);
    public function ArchiveWiki($id);
    public function CheckWiki($name);
    public function deleteWiki($id);
    public function uNArchiveWiki($id);
    public function getAdminWikis();
    public function CountWikis();
    public function CountArchivedWikis();
}
