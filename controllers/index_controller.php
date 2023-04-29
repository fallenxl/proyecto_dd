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

            if(count($advertisements) == 0){
                echo '<div class="alert alert-warning" role="alert">
                No hay anuncios en esta categoria
              </div>';
            }
            foreach($advertisements as $anuncio){
                renderCard($anuncio);
            }
        }else if((!isset($_GET['category']) or $_GET['category'] == 'all') and (!isset($_GET['search']) or $_GET['search'] == '')){
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

function  renderAdvertisementsBySearch(){
    try{
        $db = new Database();
        $advertisement = new Advertisement($db->getConnection());
        $search = $_GET['search'];
        $advertisements = $advertisement->getAdvertisementsBySearch($search);
        foreach($advertisements as $anuncio){
            renderCard($anuncio);
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function renderAdvertisementsByUser(){
    try{
        $db = new Database();
        $advertisement = new Advertisement($db->getConnection());
        $advertisements = $advertisement->getAdevertisementsByUserId($_SESSION['user_id']);
        if(count($advertisements) == 0){
            echo '<div class="alert alert-warning" role="alert">
            No tienes anuncios publicados
          </div>';
        }
        foreach($advertisements as $anuncio){
            renderCard($anuncio);
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
