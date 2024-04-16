<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$data['page_title'] . " - " .WEBSITE_TITLE?></title>

    <link rel="stylesheet" href="<?=ASSETS?>css/elements.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">

    <link rel="stylesheet" href="<?=ASSETS?>css/registration.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body data-root="<?= ROOT ?>">
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?=ASSETS?>/js/header.js"></script>
    </header>
    
    <main>
        <p>Veuillez vous connecter tout d'abord. Redirection dans <span id='countdown'>3</span> secondes...</p>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>
<script src="<?=ASSETS?>/js/connection/redirection.js"></script>
