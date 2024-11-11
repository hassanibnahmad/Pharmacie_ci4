<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Home <?php $this->endSection(); ?>


<?php $this->section('content'); ?>

<!--  -->
<!-- dashboard -->
<div class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800 border-r border-gray-300 shadow-lg">
    <h1 class="text-center text-green-500 text-2xl font-bold my-6">Dashboard</h1>
    
    <div class="bg-slate-600 p-4 rounded-lg mb-6  mx-3">
        <p class="text-center">
            Hello, <span class="font-bold text-green-500"><?= session()->get('nom') ?></span>, 
            Vous êtes connecté en tant que <span class="font-bold text-green-500"><?= session()->get('role') ?></span>
        </p>
    </div>
    
    <!-- Boutons de navigation -->
    

    <ul class="space-y-4 font-medium px-4">
        <li>
            <a href="<?= base_url('Medicaments') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3">Ajouter Medicament</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('categorie') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3">Employes</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('commande') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="ml-3">Commandes</span>
            </a>
        </li>
    </ul>

    <!-- Menu déroulant pour la déconnexion -->
    <div class="mt-6 px-4">
        <select class="w-full bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-lg hover:bg-gray-300 focus:outline-none">
            <option value="/profil">Profil</option>
            <option value="/logout">Se Déconnecter</option>
        </select>
    </div>
</div>

<!-- Contenu principal décalé pour laisser place à la sidebar -->
<div class="p-4 sm:ml-64">
    <!-- Placez ici le reste du contenu principal de votre application -->
    <div class="">
        <h1 class="text-2xl font-bold text-gray-900">Bienvenue sur votre Dashboard</h1>
    </div>

    
    <table  class=" mt-8 table-auto w-full ">
        <thead class=" bg-slate-600  ">
            <tr>
                <th class="border px-4 py-2">Reférence</th>
                <th class="border px-4 py-2">Prix</th>
                <th class="border px-4 py-2">Quantite</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Categorie</th>
                <th class="border px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2"><?php echo session()->get('ref') ?></td>
                <td class="border px-4 py-2"><?php echo session()->get('prix') ?></td>
                <td class="border px-4 py-2"><?php echo session()->get('quantite') ?></td>
                <td class="border px-4 py-2"><?php echo session()->get('date') ?></td>
                <td class="border px-4 py-2"><?php echo session()->get('categorie') ?></td>
                <td class="border px-4 py-2"><?php echo session()->get('description') ?></td>

            </tr>
        </tbody>
    </table>

    <?php //echo view('Medicaments/Createmedicament'); ?>
</div>



<?php $this->endSection(); ?>