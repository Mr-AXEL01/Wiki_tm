<?php

class Wiki extends Controller {
    private $wikiService;
    private $userService;
    private $categoryService;

    public function __construct() {
        $this->userService = new UserServiceImp();
        $this->wikiService = new WikiServiceImp();
        $this->categoryService = new CategoryServiceImp();

        // Check if the user is logged in and is not an author
        if (!Users::isloggedIn() || $this->userService->isAuthor($_SESSION["idUser"])) {
            redirect('users/login');
        }
    }

    public function index() {
        $wikis = $this->wikiService->read();
        $data = [
            "wikis" => $wikis,
            "title" => "Wikiland"
        ];
        $this->view("wiki/index", $data);
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newWiki = new Wiki();
            $newWiki->title = $_POST["title"];
            $newWiki->content = $_POST["content"];
            $newWiki->idCategory = $_POST["idCategory"];
            $newWiki->idUser = $_SESSION["idUser"];

            // Handle image upload
            $uploadDir = 'C:\xampp\htdocs\Wiki_tm\public\images\uploads\\';
            $uploadedFile = $uploadDir . $_FILES["pictureWiki"]["name"];
            move_uploaded_file($_FILES["pictureWiki"]["tmp_name"], $uploadedFile);

            $newWiki->pictureWiki = $uploadedFile;

            try {
                $this->wikiService->create($newWiki);
                redirect('wiki/index');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $categories = $this->categoryService->read();
        $data = [
            "categories" => $categories,
            "title" => "Wikiland"
        ];
        $this->view("wiki/create", $data);
    }

    public function update($idWiki) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $editedWiki = new Wiki();
            $editedWiki->title = $_POST["title"];
            $editedWiki->content = $_POST["content"];
            $editedWiki->idCategory = $_POST["idCategory"];

            // Handle image upload
            $uploadDir = 'C:\xampp\htdocs\Wiki_tm\public\images\uploads\\';
            $uploadedFile = $uploadDir . $_FILES["pictureWiki"]["name"];
            move_uploaded_file($_FILES["pictureWiki"]["tmp_name"], $uploadedFile);

            $editedWiki->pictureWiki = $uploadedFile;

            try {
                $editedWiki->idWiki = $idWiki;
                $this->wikiService->update($editedWiki);
                redirect('wiki/index');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $wiki = $this->wikiService->fetch($idWiki);
        $categories = $this->categoryService->read();
        $data = [
            "wiki" => $wiki,
            "categories" => $categories,
            "title" => "Wikiland"
        ];
        $this->view("wiki/edit", $data);
    }

    public function delete($idWiki) {
        $this->wikiService->delete($idWiki);
        redirect('wiki/index');
    }

    public function archive($idWiki) {
        $this->wikiService->softDelete($idWiki);
        redirect('wiki/index');
    }

    public function restore($idWiki) {
        $this->wikiService->restore($idWiki);
        redirect('wiki/index');
    }
}
