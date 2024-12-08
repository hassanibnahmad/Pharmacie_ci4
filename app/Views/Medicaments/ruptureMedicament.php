<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Medicaments en rupture <?php $this->endSection(); ?>

<?php $this->extend('Layouts/sidebar'); ?>
<?php $this->section('content'); ?>

<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-2xl font-bold text-blue-500  m-10 text-center capitalize">Medicaments en rupture</h1>

    
    <table class="w-full border-collapse bg-white shadow rounded mt-4 text-center">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Reférence</th>
                <th class="border px-4 py-2">Prix</th>
                <th class="border px-4 py-2 text-red-500 font-bold">Quantite</th>
                <th class="border px-4 py-2">Categorie</th>
                <th class="border px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rupture as $rupture): ?>
                <tr>
                    <td class="border px-4 py-2"><?= $rupture['date'] ?></td>
                    <td class="border px-4 py-2"><?= $rupture['ref'] ?></td>
                    <td class="border px-4 py-2"><?= $rupture['prix'] ?></td>
                    <td class="border px-4 py-2 text-red-500 font-bold"><?= $rupture['quantite'] ?></td>
                    <td class="border px-4 py-2"><?= $rupture['categorie'] ?></td>
                    <td class="border px-4 py-2"><?= $rupture['description'] ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->endSection(); ?>