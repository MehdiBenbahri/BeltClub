<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Bet Club -
        <?= $this->fetch('title'); ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" integrity="sha384-ejwKkLla8gPP8t2u0eQyL0Q/4ItcnyveF505U0NIobD/SMsNyXrLti6CWaD0L52l" crossorigin="anonymous">
    <?= $this->Html->css(['splide/splide.min','bootstrap/dist/css/bootstrap.css', 'bootstrap/dist/css/bootstrap-utilities.css', 'home', 'main']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<nav class="navbar p-1 justify-content-between navbar-dark bg-dark position-relative">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="<?= $this->Url->build('/') ?>" class="btn btn-outline-warning"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Accueil </span><i class="bi bi-house"></i></a></a>
        <a class="btn btn-outline-warning"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Évènement </span><i class="bi bi-calendar-event"></i></a>
    </div>
    <img class="z-index-100 left-50 position-absolute" height="50rem" src="<?= $this->Url->build('/img/logo.png') ?>" alt="logo-grande-faucheuse">
    <div>
        <?php if (!$user){  ?>
            <button type="button" data-bs-toggle="modal" data-bs-target="#connectionModal" class="btn btn-warning">Connexion <i class="bi bi-box-arrow-in-right"></i><i class="fa-solid fa-user"></i></button>
        <?php }else{  ?>
            <a href="<?= $this->Url->build('/users/logout') ?>" class="btn btn-warning"><i class="bi bi-door-open"></i></a>
        <?php }  ?>
    </div>


</nav>
<?php if ($user){  ?>
<nav class="navbar p-1 d-flex  justify-content-between navbar-dark bg-dark position-relative">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button class="btn btn-outline-light"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Mes évènements</span> <i class="bi bi-calendar-date"></i></button>
    <button class="btn btn-outline-light"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Mon organisation</span> <i class="bi bi-building"></i></button>
    </div>
    <span class="text-white pe-1"><?= h($user->name) ?> | <span class="<?= $user->organisation->is_legal ? 'text-light' : 'text-danger'  ?> "><?= h($user->organisation->nom) ?></span> </span>
</nav>
<?php }  ?>
<main class="main">
    <div>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <div class="modal fade" id="connectionModal" tabindex="-1" aria-labelledby="connectionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-white bg-dark rounded-0 shadow">
                    <?=  $this->element('../Users/login') ?>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
</footer>
<?= $this->Html->script(['bootstrap/js/bootstrap.min','splide/js/splide.min']) ?>
</body>
</html>
