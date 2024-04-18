<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$data['page_title'] . " - " .WEBSITE_TITLE?></title>

    <link rel="stylesheet" href="<?=ASSETS?>css/elements.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?=ASSETS?>/js/header.js"></script>
    </header>

    <main>
        <h1>Mon Profil</h1>
        <div>
            <p><strong>Nom :</strong> <?= $data['user']->lastname ?></p>
            <p><strong>Prénom :</strong> <?= $data['user']->firstname ?></p>
            <p><strong>Adresse Email :</strong> <?= $data['user']->mail ?></p>
            <p><strong>Filière :</strong> <?= $data['user']->filiere_nom ?></p>
            <p><strong>Mot de passe :</strong> <?= $data['user']->password ?></p>
            <p><strong>Date de création du compte :</strong> <?= $data['user']->registration_date ?></p>
            <!-- Ajoutez d'autres informations du profil ici -->
        </div>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>