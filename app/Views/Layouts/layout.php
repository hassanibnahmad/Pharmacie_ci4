<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       Pharmacie| <?php  $this->renderSection('titre') ?>
    </title> 
    <link rel="stylesheet" href="/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="<?= base_url('logo.png'); ?>" type="image/x-icon sizes="64x64">

</head>
<body>
    <?php $this->renderSection('content') ?>
</body>
</html>