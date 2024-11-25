<?php $this->extend('Layouts/layout'); ?>

<?php $this->section('content'); ?>

<div class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800 border-r border-gray-300 shadow-lg">
    <h1 class="text-center text-blue-500 text-2xl font-bold my-6">Dashboard</h1>
    
    <div class="bg-slate-600 p-4 rounded-lg mb-6 mx-3">
        <p class="text-center">
            Hello, <span class="font-bold text-blue-500"><?= session()->get('nom') ?></span>, 
            Vous êtes connecté en tant que <span class="font-bold text-blue-500"><?= session()->get('role') ?></span>
        </p>
    </div>

    <a href="<?= base_url('dashboard') ?>" class="m-4 flex items-center p-2 bg-blue-500 text-white rounded">
        <i class="fa-solid fa-home"></i><span class="ml-3 font-bold"> Home</span>
    </a>
    
    <!-- Accordéon pour Médicaments -->
    <div class="px-4">

        <button id="accordion-medicaments" 
                class="w-full flex justify-between items-center bg-blue-500 text-white px-4 py-2 text-left rounded focus:outline-none">
            <span class="font-bold">Médicaments</span>
            <svg id="icon-medicaments" 
                 class="w-5 h-5 transform transition-transform" 
                 fill="currentColor" 
                 viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" 
                      clip-rule="evenodd" />
                </svg>
        </button>
        <ul id="content-medicaments" class="hidden mt-2 space-y-4 font-medium">
            <li>
                <a href="<?= base_url('Medicaments') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-plus"></i><span class="ml-3"> Ajouter Médicament</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('Medicaments/list_med') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-list-ol"></i><span class="ml-3"> Liste Médicaments</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Accordéon pour Commandes -->
    <div class="px-4 mt-4">
        <button id="accordion-commandes" 
                class="w-full flex justify-between items-center bg-yellow-500 text-white px-4 py-2 text-left rounded focus:outline-none">
            <span class="font-bold">Commandes</span>
            <svg id="icon-commandes" 
                 class="w-5 h-5 transform transition-transform" 
                 fill="currentColor" 
                 viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" 
                      clip-rule="evenodd" />
            </svg>
        </button>
        <ul id="content-commandes" class="hidden mt-2 space-y-4 font-medium">
            <li>
                <a href="<?= base_url('Medicaments/create_cmd') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-plus"></i><span class="ml-3"> Ajouter Commande</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-list-ol"></i><span class="ml-3"> Liste Commandes</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Bouton de déconnexion -->
    <div class="mt-6 px-4">
        <div class="flex items-center justify-between">
            <a href="<?= base_url('login/logout') ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
            </a>
        </div>
    </div>
</div>

<!-- Script pour gérer les accordéons -->
<script>
    // Médicaments
    const accMed = document.getElementById('accordion-medicaments');
    const contentMed = document.getElementById('content-medicaments');
    const iconMed = document.getElementById('icon-medicaments');

    accMed.addEventListener('click', () => {
        contentMed.classList.toggle('hidden');
        iconMed.classList.toggle('rotate-180');
    });

    // Commandes
    const accCmd = document.getElementById('accordion-commandes');
    const contentCmd = document.getElementById('content-commandes');
    const iconCmd = document.getElementById('icon-commandes');

    accCmd.addEventListener('click', () => {
        contentCmd.classList.toggle('hidden');
        iconCmd.classList.toggle('rotate-180');
    });
</script>

<?php $this->endSection(); ?>
