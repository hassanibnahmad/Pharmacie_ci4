<?php $this->extend('Layouts/layout'); ?>
<?php $this->extend('Layouts/sidebar'); ?>
<?php $this->section('titre'); ?> Edit Medicament <?php $this->endSection() ?>
<?php $this->section('content'); ?>

<!-- edit medicaments by id -->
<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-blue-500 text-4xl font-bold mb-4">Edit Medicament</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="success">
            <h3 class="text-green-500 font-bold text-center"><?= session()->getFlashdata('success'); ?></h3>
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
    <form action="<?= base_url('Medicaments/update_med/' . $medicament['id']); ?>" method="post">
        <div class="mb-4">
            <label for="ref" class="block text-gray-700 text-sm font-bold mb-2">Reférence</label>
            <input type="text" name="ref" id="ref" value="<?= $medicament['ref'] ?>" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
            <input type="number" name="prix" id="prix" value="<?= $medicament['prix'] ?>" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="quantite" class="block text-gray-700 text-sm font-bold mb-2">Quantite</label>
            <input type="number" name="quantite" id="quantite" value="<?= $medicament['quantite'] ?>" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
            <input type="date" name="date" id="date" value="<?= $medicament['date'] ?>" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
            <select class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="1" <?= $medicament['categorie'] == '1' ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $medicament['categorie'] == '2' ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $medicament['categorie'] == '3' ? 'selected' : '' ?>>3</option>
            </select>
        </div>
        <div class="mb">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <?= $medicament['description'] ?>
            </textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Valider</button>
        </div>
        </form>
</div>

<?php $this->endSection(); ?>