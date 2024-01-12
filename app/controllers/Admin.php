<?php

class Admin extends Controller {

    private $categoryService;
    private $tagService;
    private $userService;
    private $wikiService;

    public function __construct() {
        $this->userService = new UserServiceImp();
        $this->categoryService = new CategoryServiceImp();
        $this->tagService = new TagServiceImp();
        $this->wikiService = new WikiServiceImp();

        // Check if the user is logged in and is an admin
        if (!Users::isloggedIn() || $this->userService->isAuthor($_SESSION["idUser"])) 
        {
            header("Location:" . URLROOT . "auth/login");
        }
    }

    public function dashboard() {
        $this->view("admin/dashboard");
    }

    public function categories() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newCategory = new Category();
            $newCategory->nameCategory = $_POST["nameCategory"];
            $newCategory->description = $_POST["description"];

            try {
                $this->categoryService->create($newCategory);
                header("Location:" . URLROOT . "admin/categories");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $categories = $this->categoryService->read();
        $data = [
            "categories" => $categories,
            "title" => "Wikiland"
        ];
        $this->view("admin/categories", $data);
    }

    public function tags() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newTag = new Tag();
            $newTag->nameTag = $_POST["nameTag"];

            try {
                $this->tagService->create($newTag);
                header("Location:" . URLROOT . "admin/tags");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $tags = $this->tagService->read();
        $data = [
            "tags" => $tags,
            "title" => "Wikiland"
        ];
        $this->view("admin/tags", $data);
    }

    public function users() {
        $users = $this->userService->read();
        $data = [
            "users" => $users
        ];
        $this->view("admin/users", $data);
    }

    public function wikis() {
        $wikis = $this->wikiService->read();
        $data = [
            "wikis" => $wikis
        ];
        $this->view("admin/wikis", $data);
    }
}