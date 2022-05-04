<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $events
 */
?>
<?php if (!isset($event)) { ?>
    <section class="splide">
        <div class="splide__arrows">
            <button class="splide__arrow d-none p-1 splide__arrow--prev shadow rounded-circle btn btn-secondary ">
                <i class="bi bi-caret-left-fill"></i>
            </button>
            <button class="splide__arrow d-none p-1 splide__arrow--next shadow rounded-circle btn btn-secondary">
                <i class="bi bi-caret-right-fill"></i>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list pb-4">
                <?php foreach ($events as $event) { ?>
                    <li class="splide__slide">
                        <div class="card m-2 bg-dark text-white" style="width: 18rem;">
                            <img onerror="imageError(this)" width="672px" height="56.25%"
                                 src="<?= $event->event_description->img_path ?>" class="card-img-top"
                                 alt="<?= $event->event_description->title ?>">
                            <div class="duration bg-dark blur-background bg-opacity-75 p-2 position-absolute text-center ms-1"
                                 data-start-date="<?= $event->start_date ?>"
                                 data-end-date="<?= $event->end_date ?>">
                                <div style="width: 6rem; height: 12px" class="animated-background">
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title me-1"><?= $event->event_description->title ?></h6>

                                <p class="card-text text-muted text-ellipsis"><?= $event->event_description->description ?></p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="#" class="btn btn-sm btn-outline-light">
                                        Plus d'info
                                        <i class="bi bi-info-circle"></i></a>
                                    <span
                                        class="badge rounded-pill shadow bg-<?= $event->event_type->css_class ?>"><?= $event->event_type->name ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php } else { ?>
    <div>UN EVENTS</div>
<?php } ?>


<script>
    window.addEventListener("DOMContentLoaded", (event) => {
        function imageError(elem) {
            elem.src = "https://dummyimage.com/672x378/c7c7c7/262626.png&text=image+introuvable+:(";
        }

        setInterval(function () {
            moment.locale('fr');
            $(".duration").each(function () {
                let date = $(this).data("start-date");
                if (moment.duration != undefined) {
                    var dur = moment.duration(moment(date).diff(moment()));
                }
                $(this).html(moment(date).fromNow());
            });
        }, 1000)

    });
</script>
