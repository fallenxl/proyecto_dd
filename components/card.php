<?php
include_once './config/database.php';
include_once './models/Category.php';
function renderCard($anuncio)
{

    try {
        $db = new Database();
        $category = new Category($db->getConnection());
        $category_name = $category->getCategoryNameById($anuncio['category_id']);

        echo ' <div class="p-4 bg-white rounded-lg overflow-hidden shadow-md">
    <img class="h-40 w-full object-cover" src="https://picsum.photos/200/300?random='.$anuncio['id'].'" alt="Imagen del anuncio">
    <h2 class="text-gray-800 text-lg font-bold mb-2">' . $anuncio['title'] . '</h2>
    <p class="text-gray-600 text-base mb-2 overflow-hidden h-16" id="description">' . $anuncio['description'] . '</p>
    <span class="text-gray-600 font-bold text-lg mb-4">L.' . $anuncio['price'] . '</span>
    <p class="text-gray-400 text-base mb-4">' . $category_name . '</p>
    <div class="flex justify-end">
        <a href="anuncio.php?id='.$anuncio['id'].'" class="text-gray-500 font-bold hover:text-gray-700">Ver más</a>
    </div>
    </div>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
