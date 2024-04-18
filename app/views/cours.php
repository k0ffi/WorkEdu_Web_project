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

</head>
<body>
    <header>
        <?php $this->view("header", $data); ?>
        <script src="<?= ASSETS ?>/js/header.js"></script>
    </header>

    <main>        
        <h1>Mes cours</h1>  
        <?php if (!empty($data['cours'])) : ?>
            <ul>
                <?php foreach ($data['cours'] as $course) : ?>
                    <li><?= $course->nom ?> (<?= $course->code ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Aucun cours trouvé pour cette filière.</p>
        <?php endif; ?>
    </main>

    <footer>
        <?php $this->view("footer", $data); ?>
    </footer>
</body>
</html>
