<?php
include_once 'config/database.php';
include_once 'models/User.php';
include_once 'components/alerts.php';

$database = new Database();
$connection = $database->getConnection();

if(isset($_POST['btnregistrar'])){
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = new User($connection);
        $user->createUser($email, $username, $password);

    }
    else{
        alertError('Por favor, complete todos los campos');
    }
}
