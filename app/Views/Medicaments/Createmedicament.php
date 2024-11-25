<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Ajouter Medicaments <?php $this->endSection(); ?>


<?php $this->section('content'); ?>
<?php $this->extend('Layouts/sidebar'); ?>

<!-- ajouter Medicaments form  -->
<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-blue-500 text-4xl font-bold mb-4">Ajouter Medicament</h1>

    <?php if (session()->getFlashdata('success')): ?>
                <div class="success">
                    <h3 class="text-blue-500 font-bold text-center">
                    <i class="fa-solid fa-check text-2xl "></i> <?= session()->getFlashdata('success'); ?>
                    </h3>
                </div>
    <?php endif; ?>

    <?php if (isset($validation) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="error">
            <h3 class="text-red-500 font-bold text-center"><?= $validation->listErrors(); ?></h3>
        </div>
    <?php endif; ?>

    <script>
        setTimeout(() => {
            document.querySelector('.success').style.display = 'none';
        }, 3000);

        setTimeout(() => {
            document.querySelector('.error').style.display = 'none';
        }, 3000);
    </script>

    <form action="<?= base_url('Medicaments/create_med') ?>" method="post">
        <div class="mb-4">
            <label for="ref" class="block text-gray-700 text-sm font-bold mb-2">Reférence</label>
            <input type="text" name="ref" id="ref" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
            <input type="number" name="prix" id="prix" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="quantite" class="block text-gray-700 text-sm font-bold mb-2">Quantite</label>
            <input type="number" name="quantite" id="quantite" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
            <input type="date" name="date" id="date" min="2024-01-01" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
            <select name="categorie" id="categorie" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="1">Categorie 1</option>
                <option value="2">Categorie 2</option>
                <option value="3">Categorie 3</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Ajouter</button>
        </div>
    </form>
</div>

<?php $this->endSection(); ?>