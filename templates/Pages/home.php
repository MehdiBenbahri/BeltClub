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
    <div class="container">
        <div class="content">
            <div class="row">
                <?php \Cake\Error\Debugger::dump($this); ?>
                <?=  $this->element('../Events/view') ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>
