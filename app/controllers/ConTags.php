<?php
require_once(__DIR__ . '/../services/TagsService.php');
require_once(__DIR__ . '/../models/tag.php');



$tagsService = new TagsService();

// -----------------------Add Categorys----------------------------

if (isset($_POST["addTags"])) {
    $TagsNames = explode(',', $_POST["TagsName"]);

    $id = '';

    $names =  $tagsService->CheckTags($TagsName);

    if ($CatName !== '') {

        if ($names) {
            $_SESSION['error'] = 'a tag already exists verify please !!!';

            header('Location: ../views/admin/tags.php?error=true');
        } else {
            foreach ($TagsNames as $tagName) {
                $tagName = trim($tagName);
                $tags = new Tag($id, $tagName);
                $tagsService->addtags($tags);
            }
            header('Location: ../views/admin/tags.php');
        }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/admin/tags.php?error=true');
    }
}
// --------------------------------Fetch Categorys------------------------------

$Tags = $tagsService->getTags();

// -------------------------------Data for updating---------------------------------

$name = '';
if (isset($_POST['update'])) {
    $id = $_POST['update'];

    $data =  $tagsService->displayUpdateTags($id);
    if ($data) {
        $_SESSION['tags'] = $data;
        $_SESSION['Idtag'] = $id;
        header('Location: ../views/admin/tags.php');
    } else {
        echo 'nothing happend';
    }
}
// -----------------------------UPdate Tags-------------------------------
if (isset($_POST["updateTags"])) {
    $id = $_POST["updateTags"];
    $TagName = $_POST["TagsName"];
   

    $idTag = '';
    
    if ($TagName !== '') {

     
            $tags = new tag($idTag, $TagName);
            $tagsService->updateTags($tags, $id);
            unset($_SESSION['Idtag']);
            header('Location: ../views/admin/tags.php');
        
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/admin/tags.php?error=true');
    }
}


// ----------------------------DELETE Category-----------------------------




if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $tagsService->removetags($id);
    header('Location: ../views/admin/tags.php');

}
// -------------------------Tags of wiki---------------------






// -------------------------Count Tags----------------------------


$tags =  $tagsService->CountTags();

?>
