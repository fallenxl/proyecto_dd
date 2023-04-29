<?php 
    if(!isset($_SESSION['user_id'])) 
    { 
       echo "<h3 class='text-md text-center text-black mb-4 py-4'>
                Inicia sesión para ver tu perfil 
                <a href='login.php' class='text-blue-500 ml-2 font-bold'>Iniciar sesion</a>
       </h3>";
       return;
    }

    $username = $_SESSION['username'];

    echo "
    <h4 class='text-xl font-bold text-black mb-4'>Mi perfil</h4>
    <div class='flex items-center gap-2 px-2 py-4 border-b mb-4'>
            <img src='https://picsum.photos/200' class='rounded-full w-12 h-12 object-cover'>
            <h3 class='text-md font-bold text-black'>
                $username
            </h3>
            <a href='controllers/logout_controller.php' class='text-blue-500 text-sm ml-2 font-bold'>Cerrar sesion</a>
        </div>";
    
?>
