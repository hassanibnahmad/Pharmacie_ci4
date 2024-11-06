<?php $this->extend('Layouts/layout'); ?>
<?php $this->section('titre'); ?> Register <?php $this->endSection(); ?>
<?php $this->section('content'); ?>

<div class="container mx-auto my-8 max-w-md p-4 border border-gray-300 rounded shadow-lg">
    <h1 class="text-center text-green-500 text-4xl font-bold mb-4">Register</h1>
    <form action="<?php echo base_url('register/create'); ?>" method="post" class="max-w-md mx-auto outline-offset-4">

    <p class="text-red-500 font-bold"><?= session()->getFlashdata('error') ?></p>

    <?php if(isset($validation)): ?>
            <div class="text-red-500 mb-4">

                <?= $validation->listErrors(); // listErrors() est une fonction de la classe Validation ?>
            </div>
        <?php endif; ?>
        
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500" required><br>

        <label for="cle_enregistrement">Clé d'enregistrement:</label>
        <input type="text" id="cle_enregistrement" name="cle_enregistrement" class="w-full px-4 py-2 border border-gray-300 rounded mb-4 focus:outline-none focus:border-blue-500" required><br>

        <input type="submit" value="S'inscrire" class="cursor-pointer w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
    </form>
    <p class="text-center">vous avez déja un compte <a href="/login" class="text-blue-500">Se Conécter</a></p>
</div>
</body>
</html>
<?php $this->endSection(); ?>