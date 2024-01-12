<?php

class Category extends Controller {

    private $categoryService;
    private $userService;

    public function __construct() {
        $this->userService = new UserServiceImp();
        $this->categoryService = new CategoryServiceImp();

        // Check if the user is logged in and is not an author
        if (!Users::isloggedIn() || $this->userService->isAuthor($_SESSION["idUser"])) {
            redirect('users/login');
        }
    }

    public function delete($idCategory) {
        $this->categoryService->delete($idCategory);
        redirect('admin/categories');
    }

    public function update($idCategory) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $editedCategory = new Category();
            $editedCategory->nameCategory = $_POST["nameCategory"];
            $editedCategory->description = $_POST["description"];
            
            try {
                $this->categoryService->update($editedCategory, $idCategory);
                redirect('admin/categories');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        $category = $this->categoryService->getCategory($idCategory);
        $categories = $this->categoryService->read();
        $data = [
            "category" => $category,
            "categories" => $categories,
            "title" => "Wikiland"
        ];
        $this->view("admin/categories/update", $data);
    }

    // public function create() {
    //     if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //         $newCategory = new Category();
    //         $newCategory->nameCategory = $_POST["nameCategory"];
    //         $newCategory->description = $_POST["description"];

    //         try {
    //             $this->categoryService->create($newCategory);
    //             redirect('admin/categories');
    //         } catch (PDOException $e) {
    //             die($e->getMessage());
    //         }
    //     }

    //     $categories = $this->categoryService->read();
    //     $data = [
    //         "categories" => $categories,
    //         "title" => "Wikiland"
    //     ];
    //     $this->view("admin/categories", $data);
    // }
}
