<div class="navbar">
    <div class="navbar-logo"><a href="<?=ROOT?>home"><span id="logo-work">work</span>Edu</a></div>
    <div class="navbar-links">
        <ul>
            <li><a href="<?=ROOT?>home">Accueil</a></li>

            <?php if (isset($_SESSION['admin'])) : ?>

            <?php if (isset($_SESSION['username'])&& $_SESSION['admin']==0) : ?>
            <li><a href="<?=ROOT?>cours">Mes Cours</a></li>
            <li><a href="<?=ROOT?>profil">Mon profil</a></li>
            <li><a href="<?=ROOT?>qcm">QCM</a></li>
            <?php  endif; ?>
            
            <?php if (isset($_SESSION['username'])&& $_SESSION['admin']==1): ?>
            <li><a href="<?=ROOT?>upload">Cours</a></li>
            <li><a href="<?=ROOT?>profil">Mon profil</a></li>
            <li><a href="<?=ROOT?>qcm">QCM</a></li>
            <li><a href="<?=ROOT?>liste">Liste Etudiants</a></li>
            <?php  endif; ?>
            <?php  endif; ?>
            <li><a href="<?=ROOT?>forum">Forum</a></li>

        </ul>
    </div>

    <?php if (!(isset($_SESSION['username']))) : ?>

        <a href="<?=ROOT?>login" class="header-login-btn">Se connecter</a>
        
    <?php  endif; ?>

    <?php if (isset($_SESSION['username'])) : ?>

        <a href="<?=ROOT?>logout" class="header-login-btn">Se déconnecter</a>
    
    <?php  endif; ?>

    <div class="navbar-menu-icon">
        <i class="fa-solid fa-bars"></i>
    </div>

</div>
<div class="dropdown-menu">
    <ul>
        <li><a href="<?=ROOT?>home">Accueil</a></li>
        <li><a href="<?=ROOT?>faq">FAQ</a></li>

        <!-- si l'user est connecté -->
        <?php if (isset($_SESSION['username'])) : ?>
            <li><a href="<?=ROOT?>cours">Mes cours</a></li>
            <li><a href="<?=ROOT?>profil">Mon profil</a></li>
            <li><a href="<?=ROOT?>qcm">QCM</a></li>
            <li><a href="<?=ROOT?>logout" class="header-btn-login">Se déconnecter</a></li>
        <?php  endif; ?>

        <?php if (!(isset($_SESSION['username']))) : ?>
        <li><a href="<?=ROOT?>login" class="header-btn-login">Se connecter</a></li>
        <?php  endif; ?>

    </ul>
</div>