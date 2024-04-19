<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['page_title'] . " - " .WEBSITE_TITLE?></title>

    <link rel="stylesheet" href="<?=ASSETS?>css/elements.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">

    <link rel="stylesheet" href="<?=ASSETS?>css/infosuser.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <?php $this->view("header"); ?>
    </header>

    <main>
        <div class="user_infos">
            <h1>Bienvenue <?php echo $_SESSION['firstname']; ?> !</h1>
            
            <p>Vous êtes maintenant inscrit sur notre site. Pour vous connecter vous aurez besoin de votre nom d'utilisateur et mot de passe. </p>

            <h2>Informations de connexion</h2>
            <ul>
                <li>
                    <label for="">Votre nom : </label>
                    <?php echo $_SESSION['lastname'];?>
                </li>

                <li>
                    <label for="">Votre prénom : </label>
                    <?php echo $_SESSION['firstname'];?>
                </li>

                <li>
                    <label for="">Votre adresse mail : </label>
                    <?php echo $_SESSION['mail'];?>
                </li>

                <li>
                    <label for="">Votre nom d'utilisateur : </label>
                    <?php echo $_SESSION['username'];?>
                </li>

            </ul>
        </div>
    </main>

    <footer>
        <?php $this->view("footer"); ?>
    </footer>
</body>
