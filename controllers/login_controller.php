<?php
include_once 'config/database.php';
include_once 'models/User.php';
include_once 'components/alerts.php';

$database = new Database();
$connection = $database->getConnection();

if(isset($_POST['btningresar'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = new User($connection);
        $user->login($email, $password);

    }
    else{
        alertError('Por favor, complete todos los campos');
    }
}
