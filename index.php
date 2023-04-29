<?php
include_once 'components/header.php';
?>

<main class=" mx-4 my-8">
    <div class="main__wrapper">
       <?php 
        include_once 'components/aside.php';
       ?>
        <div style="min-height: calc(100vh - 230px);">
            <section class="mb-10">
                <h4 class="text-xl font-bold text-black mb-4">Anuncios Recientes</h4>
                <div class="grid  sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php
                  include_once './controllers/index_controller.php';
                   renderModal();
                   renderAllAdvertisements()

                    ?>
                </div>
            </section>
        </div>
    </div>
</main>


<?php
include_once 'components/footer.php';
?>