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
        <h1>Aurevoir <?php echo $_SESSION['firstname'] ?></h1>
        <p>Déconnexion réussie.</p>
    </main>

    <?php unset($_SESSION['username']); ?>
    <?php unset($_SESSION['firstname']); ?>
    <?php unset($_SESSION['name']); ?>
    <?php unset($_SESSION['password']); ?>
    <?php unset($_SESSION['mail']); ?>
    <?php unset($_SESSION['date']); ?>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>

