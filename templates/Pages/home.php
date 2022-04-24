<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Belt Club -
        <?= $this->fetch('title') ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>

</header>
<main class="main">
        <div class="content">
            <div class="my-1">
                <?=  $this->element('../Events/view') ?>
            </div>
        </div>
</main>
<?= $this->Html->script(['bootstrap/js/bootstrap.min']) ?>
<script type="module" src="<?= $this->Url->build('/js/home/home.js',["fullPath" => "true"]) ?>"></script>
</body>
</html>
