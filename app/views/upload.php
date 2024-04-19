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
          <section class="section background-white">

          	<p><?php check_message() ?></p>
          	
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Charger cours</h4>
              <form method="post" enctype="multipart/form-data" name="contactForm" >
                 
         
             
                  <input name="title" class="subject" placeholder="Title" title="Title" type="text" required>
                  <p class="subject-error form-error">Entrez le titre du cours.</p>
               
                
                  <input name="file" class="subject" type="file" required>
                  <p class="subject-error form-error">Veuillez sélectionner le fichier.</p>
               

                
                <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Envoyer</button></div>
              </form>
            </div>           
          </section> 
          </main>
          <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>