<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Reset Password <?php $this->endSection(); ?>
<?php $this->section('content'); ?>

<div class="container mx-auto my-8 max-w-md p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-green-500 text-4xl font-bold mb-4">Reset Password</h1>
    
    <?php if (isset($validation)) : ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login/resetPassword/'.$token) ?>" method="post">
        <input type="hidden" name="user_id" value="<?= $token ?>" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500">
        <div>
            <label>Nouveau mot de passe</label>
            <input type="password" name="new_password" required class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" name="confirm_password" required class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <button type="submit" class="cursor-pointer w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                Réinitialiser le Mot de Passe
            </button>
        </div>
    </form>

<?php $this->endSection(); ?>