<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Reçu de Vente <?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="bg-gray-50 p-8 rounded shadow-md max-w-4xl mx-auto mt-10">
    <!-- Logo et Titre -->
    <div class="flex items-center justify-between mb-8">
        <!-- <img src="" alt="Logo de la Pharmacie" class="h-24 w-auto"> -->
        <img src="data:image/png;base64,
            <?= base64_encode(file_get_contents(FCPATH . 'logo.png')) ?>" 
            alt="Logo" class="h-24 w-auto self-center"
        >
        <!-- base64_encode(file_get_contents(FCPATH . 'logo.png')) bach n7otou l'image f pdf 3an tari9 base64 li howa format li kay7taj l'image -->
        <h1 class="text-2xl font-bold text-blue-700 uppercase text-center">Reçu de Vente</h1>
    </div>

    <!-- Remerciements -->
    <p class="text-gray-700 text-lg mb-6">
        Merci de votre confiance ! Voici les détails de votre transaction. Nous espérons vous revoir bientôt.
    </p>

    <!-- Informations sur la vente -->
    <table class="w-full border-collapse bg-white shadow rounded text-center">
        <thead>
            <tr class="bg-blue-100">
                <th class="border px-4 py-2 text-blue-900">Date</th>
                <th class="border px-4 py-2 text-blue-900">Référence</th>
                <th class="border px-4 py-2 text-blue-900">Prix Unitaire</th>
                <th class="border px-4 py-2 text-blue-900">Quantité</th>
                <th class="border px-4 py-2 text-blue-900">Montant Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventes as $vente): ?>
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2 text-gray-800"><?= esc($vente['created_at']) ?></td>
                    <td class="border px-4 py-2 text-gray-800"><?= esc($vente['ref']) ?></td>
                    <td class="border px-4 py-2 text-gray-800"><?= esc($vente['prix_med']) ?> $</td>
                    <td class="border px-4 py-2 text-gray-800"><?= esc($vente['quantite']) ?></td>
                    <td class="border px-4 py-2 text-gray-800 font-bold"><?= esc($vente['montant_total']) ?> $</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Remerciement Final -->
    <div class="mt-8 text-center">
        <p class="text-gray-600">
            Pour toute question, n'hésitez pas à nous contacter au <strong>+212 6 XX XX XX XX</strong>.
        </p>
        <p class="mt-4 text-blue-600 font-semibold">
            Pharmacie FS AGADIR - Toujours à votre service !
        </p>
    </div>
</div>

<?php $this->endSection(); ?>
