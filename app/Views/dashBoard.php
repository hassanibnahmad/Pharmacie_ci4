<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Dashboard <?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<!-- SideBar -->
<?php $this->extend('Layouts/sidebar'); ?>

<div class="p-4 sm:ml-64">
    <!-- Bienvenue -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Bienvenue sur votre Dashboard</h1>
        <p class="text-gray-600">Voici un aperçu des informations importantes de votre pharmacie.</p>
    </div>

    <!-- Statistiques principales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold text-gray-800">Total des médicaments</h2>
            <p class="text-3xl font-bold text-blue-500">
                <?php echo session()->get('totalMedicaments'); ?> 
            </p>
        </div>
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold text-gray-800">Commandes en attente</h2>
            <p class="text-3xl font-bold text-yellow-500"></p>
        </div>
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold text-gray-800">Médicaments en rupture</h2>
            <p class="text-3xl font-bold text-red-500"></p>
        </div>
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold text-gray-800">Ventes aujourd'hui</h2>
            <p class="text-3xl font-bold text-green-500"></p>
        </div>
    </div>
    
    <!-- Tableau des derniers ajouts -->
    
    <!-- Actions rapides -->
    <div class="mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Actions rapides</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="/medicament/create_med" class="p-4 bg-blue-500 text-white rounded shadow text-center">
                Ajouter un médicament
            </a>
            <a href="/commandes" class="p-4 bg-yellow-500 text-white rounded shadow text-center">
                Gérer les commandes
            </a>
            <a href="/ruptures" class="p-4 bg-red-500 text-white rounded shadow text-center">
                Voir les ruptures
            </a>
            <a href="/ventes" class="p-4 bg-green-500 text-white rounded shadow text-center">
                Consulter les ventes
            </a>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>
