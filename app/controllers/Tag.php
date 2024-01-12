<?php

class Tag extends Controller {
    private $tagService;
    private $userService;

    public function __construct() {
        $this->userService = new UserServiceImp();
        $this->tagService = new TagServiceImp();

        // Check if the user is logged in and is not an author
        if (!Users::isloggedIn() || $this->userService->isAuthor($_SESSION["idUser"])) {
            redirect('users/login');
        }
    }

    public function delete($id) {
        $this->tagService->delete($id);
        redirect('admin/tags');
    }

    public function update($idTag) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newTag = new Tag();
            $newTag->nameTag = $_POST["nameTag"];

            try {
                $this->tagService->update($newTag, $idTag);
                redirect('admin/tags');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $newTag = $this->tagService->getTag($idTag);
        $tags = $this->tagService->read();
        $data = [
            "new" => $newTag,
            "tags" => $tags,
            "title" => "wikiland"
        ];
        $this->view("admin/tags/update", $data);
    }
}
