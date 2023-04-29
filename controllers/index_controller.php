<?php 

include_once './config/database.php';
include_once './models/Advertisement.php';
include_once './models/Category.php';
include_once './components/card.php';
function renderModal(){
    include_once './components/modal_agregar.php';
}
function renderAdvertisements(){
    try{
        $db = new Database();
        $advertisement = new Advertisement($db->getConnection());
        $category = new Category($db->getConnection());
        if(isset($_GET['category']) and $_GET['category'] != 'all'){
            $category_id = $category->getCategoryIdByName($_GET['category']);
            $advertisements = $advertisement->getAdvertisementsByCategory($category_id);

            foreach($advertisements as $anuncio){
                renderCard($anuncio);
            }
        }else if(!isset($_GET['category']) or $_GET['category'] == 'all'){
            $advertisements = $advertisement->getLastAdvertisements();
            foreach($advertisements as $anuncio){
                renderCard($anuncio);
            }
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function renderAllAdvertisements(){
    try{
        $db = new Database();
        $advertisement = new Advertisement($db->getConnection());
        $advertisements = $advertisement->getAllAdvertisements();
        foreach($advertisements as $anuncio){
            renderCard($anuncio);
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

