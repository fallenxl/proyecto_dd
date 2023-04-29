<?php
include_once 'components/header.php';
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
?>
<main class="flex flex-col items-center justify-center h-screen">
    <div class="w-3/4 flex justify-center gap-2 ">
        <div class="flex flex-col  justify-center bg-white shadow-md rounded px-8 w-1/2 h-100 pt-6 pb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Iniciar Sesion</h2>
            <form method="post" action="">
                <?php
                include_once 'controllers/login_controller.php';
                ?>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Correo Electrónico
                    </label>
                    <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Ingresa tu correo electrónico" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Contraseña
                    </label>
                    <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Ingresa tu contraseña" />
                </div>
                <!-- no tienes cuenta -->
                <div class="flex items-center justify-between">
                    <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mb-4" href="register.php">
                        ¿No tienes cuenta? Registrate
                    </a>
                  
                </div>
                <div class="mb-6">
                    <input type="submit" name="btningresar" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Ingresar" />
                </div>
            </form>
            
        </div>

    </div>

</main>