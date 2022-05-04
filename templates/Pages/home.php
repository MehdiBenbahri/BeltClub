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
            <div class="row p-0 my-5 w-100">
                <div class="col-lg-8 rounded col-md-8 col-sm-12">
                    <?= $this->element('../Events/map') ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex- align-items-center flex-wrap">
                    <?php
                    if (!empty($events)) {
                        $max = 3;
                        foreach ($events as $event) {
                            if ($max > 0) {
                                $max--;
                                ?>
                                <div
                                    style="height: 10rem; background-image: url(<?= $event->event_description->img_path ?>); background-size: cover; object-fit: contain; background-position: center;
                                        background-repeat: no-repeat;"
                                    class="border big-events my-1 ms-4 rounded w-100 border-dark d-flex align-items-end flex-wrap">
                                    <div class="hover-presentation d-none w-100 text-center text-white">
                                        <div>
                                            <h1><i class="bi bi-info-circle"></i></a></h1>
                                            cliquez pour plus d'info
                                        </div>
                                    </div>
                                    <div class="bg-dark  event-presentation p-1 blur-background bg-opacity-75 text-white">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="w-100 z-index-100 text-white">
                                                <span class="fw-bolder"><?= $event->event_description->title ?></span>
                                            </h4>
                                            <span class="badge rounded-pill shadow bg-<?= $event->event_type->css_class ?>"><?= $event->event_type->name ?></span>
                                        </div>
                                        <div class=""
                                             style="max-height: 1.75rem;display: -webkit-box;overflow: hidden; -webkit-line-clamp: 1;-webkit-box-orient: vertical;">
                                            <?= $event->event_description->description ?>
                                        </div>
                                    </div>

                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?= $this->element('../Events/view') ?>
        </div>
    </div>
</main>
<?= $this->Html->script(['bootstrap/js/bootstrap.min']) ?>
<script type="module" src="<?= $this->Url->build('/js/home/home.js', ["fullPath" => "true"]) ?>"></script>
</body>
</html>
