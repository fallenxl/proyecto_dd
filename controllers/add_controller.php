<?php
include_once 'config/database.php';
include_once 'models/Advertisement.php';
include_once 'components/alerts.php';

$database = new Database();
$connection = $database->getConnection();

if(isset($_POST['btnagregar'])){
    if(!empty($_POST['title'] && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['category']))){
        $advertisement = new Advertisement($connection);
        $advertisement->createNewAdvertisement($_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['category']);
    }
}