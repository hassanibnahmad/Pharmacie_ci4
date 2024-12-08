<?php $this->extend('Layouts/layout'); ?>

<?php $this->section('content'); ?>
<style>
    .scrollable-div::-webkit-scrollbar {
        display: none;
    }
</style>
<div class="fixed top-0 left-0 z-40 w-64 h-screen overflow-y-auto bg-gray-50 dark:bg-gray-800 border-r border-gray-300 shadow-lg scrollable-div">
    <img src="/logo.png" alt="Logo de la Pharmacie" class="h-32 w-auto mx-auto mt-6">
    <h1 class="text-center text-blue-500 text-2xl font-bold mb-6">Dashboard</h1>
    
    <div class="p-4 rounded-lg mb-6 mx-3">
        <p class="text-center">
            Hello, <span class="font-bold text-blue-500"><?= session()->get('nom') ?></span>, 
            Vous êtes connecté en tant que <span class="font-bold text-blue-500"><?= session()->get('role') ?></span>
        </p>
    </div>

    <a href="<?= base_url('dashboard') ?>" class="m-4 flex items-center p-2 bg-blue-500 text-white rounded">
        <i class="fa-solid fa-home"></i><span class=" ml-9 font-bold"> Home</span>
    </a>
    
    <!-- Accordéon pour Médicaments -->
    <div class="px-4">

        <button id="accordion-medicaments" 
                class="w-full flex justify-between items-center bg-blue-500 text-white px-4 py-2 text-left rounded focus:outline-none">
                <i class="fa-solid fa-tablets"></i><span class="font-bold">Médicaments</span>
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

    <!-- Accordéon pour ventes -->
    <div class="px-4 mt-4">
        <button id="accordion-ventes" 
                class="w-full flex justify-between items-center bg-yellow-500 text-white px-4 py-2 text-left rounded focus:outline-none">
                <i class="fa-solid fa-hand-holding-dollar"></i><span class="font-bold"> Ventes</span>
            <svg id="icon-ventes" 
                 class="w-5 h-5 transform transition-transform" 
                 fill="currentColor" 
                 viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M5.23 7.21a.75.75 0 011.06 0L10 10.94l3.71-3.73a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z" 
                      clip-rule="evenodd" />
            </svg>
        </button>
        <ul id="content-ventes" class="hidden mt-2 space-y-4 font-medium">
            <li>
                <a href="<?= base_url('Ventes') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-plus"></i><span class="ml-3"> Ajouter Vente</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('ventes/list_ventes')?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-list-ol"></i><span class="ml-3"> Liste ventes</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Bouton de déconnexion -->
    <div class="mt-6 px-4">
        <div class="flex items-center justify-between">
            <a href="<?= base_url('login/logout') ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mb-12">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
            </a>
        </div>
    </div>
    <!-- // add the clock to the sidebar in bottom -->
    <div class="fixed bottom-0 left-0 w-64 bg-gray-50  border-t border-gray-300 shadow-lg text-center border-r">
      <div class="clock">
        <i class="fa-solid fa-clock"></i>
        <span id = "day" class="font-bold"></span>
        <span id="hrs" class="font-bold">00</span>
        <span>:</span>
        <span id="min"  class="font-bold">00</span>
        <span>:</span>
        <span id="sec"  class="font-bold">00</span>
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

    // ventes
    const accCmd = document.getElementById('accordion-ventes');
    const contentCmd = document.getElementById('content-ventes');
    const iconCmd = document.getElementById('icon-ventes');

    accCmd.addEventListener('click', () => {
        contentCmd.classList.toggle('hidden');
        iconCmd.classList.toggle('rotate-180');
    });
    // add the clock to the sidebar in bottom
    let hrs = document.getElementById("hrs");
    let min = document.getElementById("min");
    let sec = document.getElementById("sec");
    let day = document.getElementById("day");


    setInterval(() => {
    let timeNow = new Date();
    let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    day.innerHTML = days[timeNow.getDay()];
    hrs.innerHTML = (timeNow.getHours() < 10 ? "0" : "") + timeNow.getHours()-1;
    min.innerHTML = (timeNow.getMinutes() < 10 ? "0" : "") + timeNow.getMinutes();
    sec.innerHTML = (timeNow.getSeconds() < 10 ? "0" : "") + timeNow.getSeconds();

    }, 1000)


</script>

<?php $this->endSection(); ?>
