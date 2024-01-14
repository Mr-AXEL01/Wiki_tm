<?php
require_once(__DIR__ . '/../services/CategoryService.php');
require_once(__DIR__ . '/../models/Category.php');



$categoryService = new CategoryService();

// -----------------------Add Categorys----------------------------

if (isset($_POST["addCat"])) {
    $CatName = $_POST["CategoryName"];
    $CatDescr = $_POST["CategoryDesc"];
    $image = $_FILES["image"]["name"];

    $id = '';
    $names =  $categoryService->CheckCat($CatName);
    if ($CatName !== '' && $CatDescr !== ''  && preg_match('/^[A-Za-z\s-]+$/', $CatName)) {

        if ($names) {
            $_SESSION['error'] = 'Category Already Exist';

            header('Location: ../views/admin/Categories.php?error=true');
        } else {
            $category = new Category($id, $CatName, $CatDescr, URLROOT . 'public/images/' . $image);
            $categoryService->addCategory($category);
            header('Location: ../views/admin/Categories.php');
        }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/admin/Categories.php?error=true');
    }
}


// --------------------------------Fetch Categorys------------------------------

$Categorys = $categoryService->getCategorys();

$categories =$categoryService->getHomeCategorys();



// <!-- ---------------------data for updating------------------------ -->
$name = '';
$desc = '';
$img = '';
if (isset($_POST['update'])) {
    $id = $_POST['update'];

    $data =  $categoryService->displayUpdate($id);
    if ($data) {
        $_SESSION['category'] = $data;
        $_SESSION['IdCat'] = $id;
        header('Location: ../views/admin/Categories.php');
    } else {
        echo 'rien de rien';
    }
}
// ------------------------------------Update Category---------------------------------

if (isset($_POST["updateCat"])) {
    $id = $_POST["updateCat"];
    $CatName = $_POST["CategoryName"];
    $CatDescr = $_POST["CategoryDesc"];
    $image = $_FILES["image"]["name"];

    $idcat = '';
    
    if ($CatName !== '' && $CatDescr !== ''  && preg_match('/^[A-Za-z\s-]+$/', $CatName)) {

     
            $category = new Category($idcat, $CatName, $CatDescr, URLROOT . 'public/images/' . $image);
            $categoryService->updateCategory($category, $id);
            unset($_SESSION['IdCat']);
            header('Location: ../views/admin/Categories.php');
        
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/admin/Categories.php');
    }
}



// ----------------------------DELETE Category-----------------------------




if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $categoryService->removeCatgory($id);
    header('Location: ../views/admin/Categories.php');

}

// -------------------------Count category----------------------------


$category =  $categoryService->CountCatgorys();













