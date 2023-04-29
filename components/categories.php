<h4 class="text-xl font-bold text-black mb-4">Categorias</h4>
<a href="./controllers/category_controller.php?category=all" class="bg-gray-100 hover:bg-gray-200 mb-2 px-4 py-2 rounded-md">Todas</a>
<?php
include_once './config/database.php';
include_once './models/Category.php';

try {
    $db = new Database();
    $category = new Category($db->getConnection());
    $categories = $category->getAllCategories();
    foreach ($categories as $category) {
        echo "<a href='./controllers/category_controller.php?category=" . $category['name'] .
            "' class='bg-gray-100 hover:bg-gray-200 mb-2 px-4 py-2 rounded-md'>" . $category['name'] . "</a>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>