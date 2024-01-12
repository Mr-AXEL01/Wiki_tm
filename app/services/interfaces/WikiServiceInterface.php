<?php

interface WikiServiceInterface {
    public function read();
    public function readArchived();
    public function wikisOfAuthor($idUser);
    public function create(Wiki $wiki);
    public function update(Wiki $wiki);
    public function delete($idWiki);
    public function softDelete($idWiki);
    public function restore($idWiki);
    public function fetch($idWiki);
    public function getColumns();
}
