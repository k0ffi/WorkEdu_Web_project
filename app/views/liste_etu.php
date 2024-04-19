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
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?= ASSETS ?>/js/header.js"></script>
    </header>

    <main>        
        <h1>La liste des étudiants</h1>  
        <?php if (!empty($data['liste_etu'])) : ?>
            <ul>
                <?php foreach ($data['liste_etu'] as $etudiant) : ?>
                    <li><?= $etudiant->firstname ?> <?= $etudiant->lastname ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Aucun étudiant créé.</p>
        <?php endif; ?>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>