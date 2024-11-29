<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Forgot Password <?php $this->endSection(); ?>
<?php $this->section('content'); ?>

<div class="container mx-auto my-8 max-w-md p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-green-500 text-4xl font-bold mb-4">forgot Password</h1>
    <form action="<?= base_url('login/forgotPassword'); ?>" method="post" class="max-w-md mx-auto outline-offset-4">
        
            <?php if (isset($validation)): ?>
                <div class="text-red-500 font-bold">
                    <?= $validation->getError('email') ?>
                </div>
                <div>
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
        
        <input type="submit" value="Login" class="cursor-pointer w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">

    </form>
    <p class="text-center"> Vous n'avez pas un Compte? <a href="/register" class="text-blue-500">Register here</a></p>
</div>
<?php $this->endSection(); ?>
