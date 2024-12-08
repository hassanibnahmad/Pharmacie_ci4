<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> List des Ventes <?php $this->endSection(); ?>

<?php $this->extend('Layouts/sidebar'); ?>
<?php $this->section('content'); ?>
<div class="container ml-72 max-w-5xl my-8  p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-2xl font-bold text-blue-500  m-10 text-center uppercase">Liste des Ventes de M. <span class="text-green-700"><?= session()->get('nom') ?></span></h1>
    <a href="<?= base_url('/ventes') ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"><i class="fa-solid fa-add"></i> Ajouter Nouveau Vente</a>

    <?php if (empty($ventes)): ?>
        <p class="text-center text-red-500 font-bold mt-4">Aucune vente effectuée</p>
    <?php else: ?>
    <table class="w-full border-collapse bg-white shadow rounded mt-4 text-center">
            <thead>
                <tr class="bg-gray-100">                    
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Reférence</th>
                    <th class="border px-4 py-2">Prix</th>
                    <th class="border px-4 py-2">Quantite</th>
                    <th class="border px-4 py-2">Montant Total</th>
                    <th class="border px-4 py-2"></th>
                </tr>
                <tr>

            </thead>
            <tbody>
            <?php foreach ($ventes as $vente): ?>
                <tr>
                    <td class="border px-4 py-2"><?= esc($vente['created_at']) // esc bach n7mlo escape des données bach ma ykounch fiha code js ?></td>
                    <td class="border px-4 py-2"><?= esc($vente['ref']) ?></td>
                    <td class="border px-4 py-2"><?= esc($vente['prix_med']) ?></td>
                    <td class="border px-4 py-2"><?= esc($vente['quantite']) ?></td>
                    <td class="border px-4 py-2"><?= esc($vente['montant_total']) ?></td>

                        <td class="border px-4 py-2">
                            <a href="<?= base_url('Ventes/telecharger_recue/' . $vente['id']) ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Télécharger Recue</a>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
      <?php endif; ?>
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
