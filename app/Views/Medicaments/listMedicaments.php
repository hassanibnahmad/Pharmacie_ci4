<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> List des Medicaments <?php $this->endSection(); ?>

<?php $this->extend('Layouts/sidebar'); ?>
<?php $this->section('content'); ?>
<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-2xl font-bold text-blue-500  m-10 text-center capitalize">Liste des medicaments</h1>


    <?php if (session()->getFlashdata('success')): ?>
        <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h3 class="text-blue-600 font-bold text-center">
                <i class="fa-solid fa-check text-2xl "></i> <?= session()->getFlashdata('success'); ?>
            </h3>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const successModal = document.getElementById('successModal');
        if (successModal) {
            setTimeout(() => {
                successModal.style.display = 'none';
            }, 1000);
        }
    });//DOMContentLoaded  est l'evenement qui se produit lorsque le document HTML a été complètement chargé et analysé, sans attendre les feuilles de style, les images et les sous-trames pour terminer le chargement.
</script>  

    <!-- Modal -->
<div id="deleteModal" class="fixed inset-0 hidden  bg-gray-900 bg-opacity-50">
    <div class="flex items-center justify-center mt-64">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Confirmation</h2>
            <p class="mb-4">Voulez-vous vraiment supprimer ce medicament?</p>
            <div class="flex justify-end">
                <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                <button id="confirmButton" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </div>
        </div>
    </div>
</div>

    <a href="<?= base_url('Medicaments/create_med') ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"><i class="fa-solid fa-add"></i> Ajouter Medicament</a>
    <table class="w-full border-collapse bg-white shadow rounded mt-4 text-center">
            <thead>
                <tr class="bg-gray-100">                    
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Reférence</th>
                    <th class="border px-4 py-2">Prix</th>
                    <th class="border px-4 py-2">Quantite</th>
                    <th class="border px-4 py-2">Categorie</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($medicaments as $medicament): ?>
                <tr>
                        <td class="border px-4 py-2"><?= $medicament['date'] ?></td>
                        <td class="border px-4 py-2"><?= $medicament['ref'] ?></td>
                        <td class="border px-4 py-2"><?= $medicament['prix'] ?> $</td>
                        <td class="border px-4 py-2"><?= $medicament['quantite'] ?></td>
                        <td class="border px-4 py-2"><?= $medicament['categorie'] ?></td>
                        <td class="border px-4 py-2"><?= $medicament['description'] ?></td>
                        <td class="border px-4 py-2">
                            <a href="<?= base_url('Medicaments/edit_med/' . $medicament['id']) ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="confirmDelete(<?= $medicament['id'] ?>)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer"><i class="fa-solid fa-trash"></i></a>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      
</div>
<script>
    function confirmDelete(id) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('confirmButton').addEventListener('click', () => {
            window.location.href = '<?= base_url('Medicaments/delete_med/') ?>' + id;
        });
        document.getElementById('cancelButton').addEventListener('click', () => {
            document.getElementById('deleteModal').classList.add('hidden');
        });
    }
</script>
<?php $this->endSection(); ?> 
