<?php
require_once(__DIR__ . '/../services//WikiService.php');

require_once(__DIR__ . '/../models/wiki.php');
require_once(__DIR__ . '/../models/wikisTags.php');



$WikisService = new WikiService();

// -----------------------Add wiki----------------------------

if (isset($_POST["addWiki"])) {
    $wikiTitile = $_POST["Title"];
    $wikiSummary = $_POST["summary"];
    $wikiContent = $_POST["content"];
    $wikiCategory = $_POST['category'];
    $wikiAuthor = $_SESSION['user'];
    $image = $_FILES["image"]["name"];

    $WikiStatus = TRUE;
    $selectedTags = isset($_POST['nametag']) ? $_POST['nametag'] : array();

    $id = '';
    $title =  $WikisService->CheckWiki($wikiTitile);
    if ($wikiTitile !== '' && $wikiSummary !== '' && $wikiContent !== '' && $wikiCategory !== ''   && preg_match('/^[A-Za-z\s-]+$/', $wikiTitile)) {

        if ($title) {
            $_SESSION['error'] = 'Wiki Already Exist';

            header('Location: ../views/Author/AddWiki.php?error=true');
        } else {
            $wikis = new wiki($id, URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent, $wikiSummary, $created_at, $wikiCategory, $wikiAuthor, $WikiStatus);
            $wikiId =  $WikisService->addWikis($wikis);
            foreach ($selectedTags as $selectedTag) {
            $tagname='';
                $wikistags = new WikisTags($wikiId, $selectedTag,$tag);
                $WikisService->TagsOfWikis($wikistags);
            }
            header('Location: ../views/Author/dashboardWikis.php');
        }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/Author/AddWiki.php?error=true');
    }
}
// --------------------------fetch Wikis-------------------------------

if(isset($_POST["catId"])) {
$_SESSION["CatId"] = isset($_POST["catId"]) ? $_POST["catId"] :'';


header('Location: '.URLROOT. 'app/views/visiteur/wikis.php');

}

$id = isset($_SESSION["CatId"]) ? $_SESSION["CatId"] :'';

$wikisCat =  $WikisService->getFilteredWikis($id);





$wikis =  $WikisService->getWikis();


// -----------------------------Fetch Wikis for home page -------------------------

$wikiHome =  $WikisService->getHomeWiki();








if (isset($_POST['Unset'])) {
    unset($_SESSION["CatId"]);
    header('Location: ../views/visiteur/wikis.php');
}
// --------------------------fetch Admin Wikis-------------------------------

$AdminWikis =  $WikisService->getAdminWikis();


// --------------------------fetch Auhor Wikis-------------------------------
$UserId = isset($_SESSION['user']) ? $_SESSION['user'] :'';
$AuthorWikis =  $WikisService->getAuthorWikis($UserId);



// ------------------------------Display update data-----------------------

$img = '';
$title = '';
$summary = '';
$content = '';
if (isset($_POST['update'])) {
    $id = $_POST['update'];

    $data =  $WikisService->displayUpdateWiki($id);
    if ($data) {
        $_SESSION['wikis'] = $data;
        $_SESSION['Idwiki'] = $id;
        header('Location: ../views/Author/AddWiki.php');
    } else {
        echo 'rien de rien';
    }
}

// --------------------------------Update Wiki----------------------------------

if (isset($_POST["updatewiki"])) {
    $id = $_POST["updatewiki"];
    $wikiTitile = $_POST["Title"];
    $wikiSummary = $_POST["summary"];
    $wikiContent = $_POST["content"];
    $wikiCategory = '';
    $wikiAuthor = '';
    $image = $_FILES["image"]["name"];
      $WikiStatus = '';
    $idwiki = '';
    if ($wikiTitile !== '' && $wikiSummary !== '' && $wikiContent !== '') {



        $wikis = new wiki($idwiki, URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent, $wikiSummary, $created_at, $wikiCategory, $wikiAuthor, $WikiStatus);
        $WikisService->updateWiki($wikis, $id);
        unset($_SESSION['Idwiki']);
        header('Location: ../views/Author/dashboardWikis.php');
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/Author/AddWiki.php?error=true');
    }
}


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $WikisService->deleteWiki($id);
    header('Location: ../views/Author/dashboardWikis.php');
}

// ---------------------------Archive-----------------------------

if (isset($_POST['archive'])) {
    $id = $_POST['archive'];
    $WikisService->ArchiveWiki($id);
    header('Location: ../views/admin/wikis.php');
}
// ---------------------------UnArchive-----------------------------

if (isset($_POST['unarchive'])) {
    $id = $_POST['unarchive'];
    $WikisService->uNArchiveWiki($id);
    header('Location: ../views/admin/wikis.php');
}

// -------------------------------Count Wikis---------------------------------------------

$wikiTot = $WikisService->CountWikis();

// -------------------------------Count Archived Wikis---------------------------------------------

$wikiArchived = $WikisService->CountArchivedWikis();

// ----------------------------------- WIKI -------------------------------------------

if(isset($_POST["wikiId"])) {
    $_SESSION["wikiId"] = isset($_POST["wikiId"]) ? $_POST["wikiId"] :'';
    
    
    header('Location: '.URLROOT. 'app/views/visiteur/WikiContent.php');
    
    }
    $id = isset($_SESSION["wikiId"]) ? $_SESSION["wikiId"] :'';

$wiki = $WikisService->Wiki($id);


// -----------------------------------Tags---------------------------------------

$tagse = $WikisService->WikiTag();

// -------------------------ajax-----------------------------

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
        $wikis = $WikisService->searchWikis($searchTerm);
    require_once(__DIR__.'/../views/visiteur/Search.php');
    }
?>
