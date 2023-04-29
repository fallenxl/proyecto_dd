<?php
include_once 'components/header.php';
include_once './config/database.php';
include_once './models/Advertisement.php';
include_once './models/Category.php';

$database = new Database();
$connection = $database->getConnection();
$advertisement = new Advertisement($connection);
$category = new Category($connection);
$anuncio = $advertisement->getAdvertisementsById($_GET['id']);
$category_name = $category->getCategoryNameById($anuncio['category_id']);

?>

<main class="flex  flex-col justify-center items-center md:flex-row  " style="height: calc(100vh - 165px);">
    <div class="bg-white rounded-lg overflow-hidden flex items-center w-3/4 md:w-2/4 gap-4" style="height: 650px;">
        <img class="h-full w-2/4 object-cover" src="https://picsum.photos/200/300?random=<?php echo $_GET['id'] ?>" alt="Imagen del anuncio">
        <div class="py-4 px-2 flex flex-col justify-between items-center w-full h-5/6 items-center">
            <div class="flex flex-col w-full mb-4">
                <h1 class="text-3xl font-bold mb-2"><?php echo $anuncio['title'] ?></h1>
                <h2 class="text-sm"><?php echo $category_name ?></h2>
            </div>
            <div class="flex flex-col w-full gap-2 overflow-auto mb-4">
                <h3 class="text-sm font-bold">Descripción</h3>
                <p class="text-lg"><?php echo $anuncio['description'] ?></p>
            </div>
            <div class="flex flex-col w-full gap-2 mb-4">
                <h3 class="text-sm font-bold">Precio</h3>
                <p class="text-2xl">L.<?php echo $anuncio['price'] ?></p>
            </div>
            <div class="flex flex-col w-full gap-2 ">
                <h3 class="text-sm font-bold">Contacto</h3>
                <p class="text-lg"><?php echo $anuncio['username'] ?></p>
                <p class="text-lg"><?php echo $anuncio['email'] ?></p>

            </div>



        </div>
    </div>
</main>

<?php
include_once 'components/footer.php';
?>