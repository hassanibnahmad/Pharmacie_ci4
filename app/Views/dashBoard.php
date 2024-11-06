<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Home <?php $this->endSection(); ?>


<?php $this->section('content'); ?>

<!--  -->
<!-- dashboard -->
<div class="container mx-auto my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-green-500 text-4xl font-bold mb-4">Dashboard</h1>
    <div class="">
        <a href="<?= base_url('produit') ?>" class=" mx-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Ajouter Medicament</a>
        <a href="<?= base_url('categorie') ?>" class=" mx-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Liste Medicaments</a>
        <a href="<?= base_url('commande') ?>" class=" mx-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Commandes</a>
<select>
    <option value="volvo">
        <a href="/login"></a>
    </option>
    <option value="saab">Se Déconnecter</option>
    
</select>
    </div>

<?php $this->endSection(); ?>