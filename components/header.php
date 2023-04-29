<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Mi sitio web</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- index.js -->
    <script src="./assets/js/index.js" defer></script>

</head>

<body class="bg-gray-100">
    <header class="bg-white border-b border-gray-200">
        <div class="container mx-auto flex justify-between items-center py-4">
            <a href="./index.php" class="text-2xl font-bold text-black">Anunciatee!</a>
            <nav class="w-3/4">
                <div class="flex items-center justify-end">
                    <?php
                    $pathName = $_SERVER['REQUEST_URI'];
                    if ($pathName !== '/proyecto_dd/register.php' && $pathName !== '/proyecto_dd/login.php') {
                        echo '<div class="flex w-2/4 px-4 gap-2 mr-20 hidden lg:flex">
                        <input type="text" class="w-full bg-gray-100 border-2 border-gray-200 rounded-lg px-4 py-2  " placeholder="Buscar">
                        <button class="bg-black text-white py-2 px-4 rounded-lg">Buscar</button>
                    </div>';
                    }
                    ?>
                    <ul class="flex items-center space-x-8">
                        <li><a href="./index.php" class="text-gray-600 hover:text-black">Inicio</a></li>

                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li><a href="./anuncios?user=' . $_SESSION['user_id'] . '" class="text-gray-600 hover:text-black">Mis Anuncios</a></li>';
                            echo '<li><button onclick="openModal()" class="bg-black text-white px-4 py-2 rounded-md ">Crear Anuncio</button></li>';
                        } else {
                            echo '<li><a href="./register.php" class="bg-black text-white py-2 px-4 rounded-lg ">Registro</a></li>';
                        }
                        ?>
                    </ul>
                </div>

            </nav>
        </div>
    </header>