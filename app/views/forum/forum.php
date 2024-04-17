<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] . " - " . WEBSITE_TITLE ?></title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/elements.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ASSETS ?>/js/forum/forum.js"></script>

</head>
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?= ASSETS ?>/js/header.js"></script>
    </header>
    
    <main>
        <h2>Viens à la rescousse des étudiants comme toi !</h2>
        <br>

        <!-- Bouton pour afficher le formulaire de question -->
        <div class="button-container">
            <button class="toggle-action flat-button">Poser une question</button>
        </div>

        <!-- Formulaire pour poser une question (initialement caché) -->
        <form id="ask-question-form" method="post" style="display: none;">
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            <input type="submit" class="flat-button" value="Poser la question">
        </form>

        <!-- PARTIE QUESTIONS -->
        
        <?php foreach ($data['discussions'] as $discussion): ?>
            <div class="forum-discussion">
                <div class="forum-question">
                    <div class="forum-item-header">
                        <div class="forum-item-header-title">
                            <p class="username"><?= htmlspecialchars($discussion['username']) ?></p>
                            <p class="date-desc">Publiée le <?= $discussion['created_at'] ?></p>
                        </div>
                    </div>
                    <div class="forum-item-body">
                        <?= $discussion['content'] ?>
                    </div>
                </div>
                <!-- Afficher les réponses -->
                <?php if (!empty($discussion['replies'])): ?>
                    <div class="replies-container">
                        <p>Réponses :</p>
                        <?php foreach ($discussion['replies'] as $reply): ?>
                            <div class="reply-item">
                                <p class="reponse-username"><em><?= htmlspecialchars($reply['username']) ?>:</em></p>   
                                <p class="reponse-text"><?= htmlspecialchars($reply['content']) ?></p>
                                <p class="reponse-date"><?= htmlspecialchars($reply['created_at']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Bouton "Répondre" pour cette discussion -->
                <a href="#" class="toggle-reply">Répondre</a>

                <!-- Formulaire de réponse (initialement caché) -->
                <form action='<?= ROOT . "forum/index" ?>' method='post' class='toggle-textarea' style='display: none;'>
                    <input type='hidden' name='parent_id' value='<?= $discussion['id'] ?>'>
                    <label for='content'>Réponse :</label><br>
                    <textarea name='content' rows='4' cols='50' required></textarea><br>
                    <input type='submit' value='Répondre' class='reply-button'>
                </form>
            </div>
                            
        <?php 
        endforeach; 
        if (!empty($_SESSION['msg'])) echo $_SESSION['msg'];
        ?>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>
