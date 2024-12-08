<!-- create ventes -->
<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Ajouter nouvelle Vente <?php $this->endSection(); ?>


<?php $this->section('content'); ?>
<?php $this->extend('Layouts/sidebar'); ?>
<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-blue-500 text-4xl font-bold mb-4">Ajouter Vente</h1>

    <?php if (session()->has('success')): ?>
        <div class="text-blue-500 font-bold mb-4 text-center">
            <p><i class="fa-solid fa-check text-2xl "></i><?= session('success') ?></p>
        </div>
    <?php endif; ?>
    <?php if (session()->has('error')): ?>
        <div class="text-red-500 font-bold mb-4 text-center">
            <p> <i class="fa-solid fa-exclamation-triangle text-2xl "></i> <?= session('error') ?></p>
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

    <form method="post" action="<?= base_url('ventes/create_vente') ?>" class="w-full max-w-lg">
        <div class="mb-4">
            <label for="medicament_id" class="block text-gray-700 text-sm font-bold mb-2">Médicament:</label>
            <select name="medicament_id" id="medicament_id" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <?php foreach ($medicaments as $medicament): ?>
                    <option value="<?= $medicament['id'] ?>" data-prix="<?= $medicament['prix'] ?>">
                         <?= $medicament['ref'] ?> (<?= $medicament['prix'] ?> $)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="quantite" class="block text-gray-700 text-sm font-bold mb-2">Quantité:</label>
            <input type="number" name="quantite" id="quantite" class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="1">
        </div>
        <!-- prix -->
        <div class="mb-4">
            <input type="text" name="prix" id="prix" 
                    class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- montatnt total -->
        <div class="mb-4">
            <label for="montant_total" class="block text-gray-700 text-sm font-bold mb-2">Montant Total:</label>
            <input type="number" name="montant_total" id="montant_total"  
                    class=" border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    min="1" >
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
    </form>
</div>    



<script>

        // 
    document.addEventListener('DOMContentLoaded', function() {
        let medicamentSelect = document.getElementById('medicament_id');
        let prixInput = document.getElementById('prix');

        medicamentSelect.addEventListener('change', function() {
            const selectedOption = medicamentSelect.options[medicamentSelect.selectedIndex];
            const prix = selectedOption.getAttribute('data-prix');
            prixInput.value = prix;
        });

        // Initial trigger to set the price based on the default selected option
        const initialSelectedOption = medicamentSelect.options[medicamentSelect.selectedIndex];
        const initialPrix = initialSelectedOption.getAttribute('data-prix');
        prixInput.value = initialPrix;
    });

    // Montant total
    let prixInput = document.getElementById('prix');
    let quantiteInput = document.getElementById('quantite');
    let mt = document.getElementById('montant_total');

    prixInput.addEventListener('input', function() {
        calculateMontantTotal();
    });

    quantiteInput.addEventListener('input', function() {
        calculateMontantTotal();
    });

    function calculateMontantTotal() {
        let prix = parseFloat(prixInput.value);
        let quantite = parseFloat(quantiteInput.value);
        let montantTotal = prix * quantite;
        mt.value = montantTotal;
    }

</script>

<?php $this->endSection(); ?>