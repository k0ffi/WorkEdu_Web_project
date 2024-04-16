<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Inscription</title>

    <link rel="stylesheet" href="<?=ASSETS?>/css/style.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/elements.css">

    <link rel="stylesheet" href="<?=ASSETS?>/css/registration.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?=ASSETS?>/js/header.js"></script>
    </header>

    <main>
        <div class="form-container">
            <h2>Inscription</h2>
            <p> <?php check_message(); ?> </p>            
            <form method="post">
                <div class="form-input">
                    <input type="text" name="name" placeholder="nom">
                </div>
                <div class="form-input">
                    <input type="text" name="firstname" placeholder="Prénom">
                </div>
                <div class="form-input">
                    <input type="text" name="mail" placeholder="Addresse mail">
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <input type="submit" value="Inscription" class="btn-signup">
                <a class="message" href="<?=ROOT?>login">Déjà inscrit ?</a>
            </form>
        </div>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>
            