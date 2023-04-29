<?php
session_start();
include_once './../models/Advertisement.php';
include_once './../config/database.php';

if($_SESSION['user_id'].'' == $_GET['user']){
    $db = new Database();
    $advertisement = new Advertisement($db->getConnection());
    $advertisement->deleteAdvertisementById($_GET['id']);
    header('Location: ./../index.php');

}