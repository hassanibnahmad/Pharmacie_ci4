<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Login <?php $this->endSection(); ?>
<?php $this->section('content'); ?>

<div class="container mx-auto my-8 max-w-md p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-green-500 text-4xl font-bold mb-4">Login</h1>
    <form action="<?= base_url('login/login'); ?>" method="post" class="max-w-md mx-auto outline-offset-4">
        
    <p class="text-red-500 font-bold"><?= session()->getFlashdata('error') ?></p>

        <?php if(isset($validation)): ?>
            <div class="text-red-500 mb-4 font-bold">
                <?= $validation->listErrors(); // listErrors() est une fonction de la classe Validation ?>
            </div>
            <div class="text-red-500 font-bold">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('success')): ?>
                <div class="text-blue-500 font-bold">
                    <?= session('success') ?>
                </div>
        <?php endif; ?>
           
        <label for="email" class="block mb-2">Email:</label>
        <input type="text" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500">
        
        <label for="password" class="block mb-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500">
        
        <input type="submit" value="Login" class="cursor-pointer w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">

    </form>
    <p class="text-center mt-4">Mot de passe oublié? <a href="<?php echo base_url('/forgotPassword'); ?>" class="text-blue-500">Cliquez ici</a></p>
    <p class="text-center">Vous n'avez pas un Compte? <a href="/register" class="text-blue-500">Register here</a></p>
</div>
<?php $this->endSection(); ?>
