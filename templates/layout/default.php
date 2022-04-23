<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Bet Club -
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" integrity="sha384-ejwKkLla8gPP8t2u0eQyL0Q/4ItcnyveF505U0NIobD/SMsNyXrLti6CWaD0L52l" crossorigin="anonymous">
    <?= $this->Html->css(['bootstrap/dist/css/bootstrap.css', 'bootstrap/dist/css/bootstrap-utilities.css', 'home', 'main']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<nav class="navbar p-1 justify-content-between navbar-dark bg-dark position-relative">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-outline-warning"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Accueil </span><i class="bi bi-house"></i></button>
        <button type="button" class="btn btn-outline-warning"><span class="d-xs-none d-sm-none d-md-inline d-lg-inline">Évènement </span><i class="bi bi-calendar-event"></i></button>
    </div>
    <img class="z-index-100 left-50 position-absolute" height="50rem" src="<?= $this->Url->build('/img/logo.png') ?>" alt="logo-grande-faucheuse">
    <div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#connectionModal" class="btn btn-warning">Connexion <i class="bi bi-box-arrow-in-right"></i><i class="fa-solid fa-user"></i></button>
    </div>
</nav>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <div class="modal fade" id="connectionModal" tabindex="-1" aria-labelledby="connectionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-white bg-dark rounded-0 shadow">
                    <h2 class="text-uppercase text-center">Connexion</h2>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
</footer>
<?= $this->Html->script(['bootstrap/js/bootstrap.min']) ?>
</body>
</html>
