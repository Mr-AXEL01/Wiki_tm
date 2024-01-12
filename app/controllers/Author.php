<?php

class Author extends Controller {

    private $wikiService;
    private $userService;
    private $categoryService;
    private $tagService;

    public function __construct() {
        $this->userService = new UserServiceImp();
        $this->wikiService = new WikiServiceImp();
        $this->categoryService = new CategoryServiceImp();
        $this->tagService = new TagServiceImp();

        // Check if the user is logged in and is an author
        if (!Users::isloggedIn() || !$this->userService->isAuthor($_SESSION["idUser"])) {
            redirect('users/login');
        }
    }

    public function wikis() {
        $wikis = $this->wikiService->wikisOfAuthor($_SESSION["idUser"]);
        $categories = $this->categoryService->read();
        $data = [
            "categories" => $categories,
            "wikis" => $wikis
        ];
        $this->view("author/wikis", $data);
    }

    public function dashboard() {
        $this->view("author/dashboard");
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newWiki = new Wiki();

            // Handle image upload
            $uploadDir = 'C:\xampp\htdocs\Wiki_tm\public\images\uploads\\';
            $uploadedFile = $uploadDir . $_FILES["pictureWiki"]["name"];
            move_uploaded_file($_FILES["pictureWiki"]["tmp_name"], $uploadedFile);

            $newWiki->pictureWiki = $uploadedFile;
            $newWiki->title = $_POST["title"];
            $newWiki->content = $_POST["content"];
            $newWiki->idCategory = $_POST["idCategory"];
            $newWiki->idUser = $_SESSION["idUser"];
            $newWiki->wikiStatut = 1;

            try {
                $this->wikiService->create($newWiki);
                redirect('author/wikis');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $categories = $this->categoryService->read();
        $tags = $this->tagService->read();
        $data = [
            "tags" => $tags,
            "categories" => $categories,
        ];
        $this->view("author/create", $data);
    }
}
