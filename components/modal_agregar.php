<div class='modal fixed top-0 left-0 w-full h-screen'>
    <div class='flex justify-center items-center w-full h-full'>
        <div class='bg-white rounded-lg w-3/6 px-10 py-4 '>
            <div class='flex flex-col items-start p-4'>
                <div class='flex items-center justify-between w-full mb-4 border-b py-4'>
                    <div class='text-gray-900 font-medium text-lg mb-2 '>Agregar Anuncio</div>
                    <button onclick="closeModal()" class="flex items-center justify-center bg-gray-50 hover:bg-gray-200 rounded-full h-10 w-10  p-4">
                        <i class="fas fa-times text-gray-800 text-xl"></i>
                    </button>
                </div>
                <div class='flex flex-col w-full items-center'>
                    <div class="w-full">
                        <form method="POST" action=""  >
                            <?php
                            include_once 'controllers/add_controller.php'
                            ?>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Titulo
                                </label>
                                <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required id="title" type="text" placeholder="PlayStation 5">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Descripcion
                                </label>
                                <textarea name="description" required id="description" placeholder="PlayStation 5 color blanco..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                                    Precio (Lps)
                                </label>
                                <input pattern="[0-9]+" name="price" required id="price" type="number" placeholder="12000" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                    Categoria
                                </label>
                                <select name="category" required id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" disabled selected>Seleccione una categoria</option>
                                    <?php
                                    include_once './config/database.php';
                                    include_once './models/Category.php';
                                    try {
                                        $db = new Database();
                                        $category = new Category($db->getConnection());
                                        $categories = $category->getAllCategories();
                                        foreach ($categories as $category) {
                                            echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="flex items-center justify-center">
                                <input name="btnagregar" type="submit" class="bg-gray-700 cursor-pointer hover:bg-gray-900 text-white w-2/4  py-2 px-4 rounded text-center  focus:outline-none focus:shadow-outline" value="Agregar"/>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>