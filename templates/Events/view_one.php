<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var \App\Model\Entity\EventsLot $lots
 */
//debug($event);
?>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
<div class=" d-flex align-items-end flex-wrap" style="
    background-image: url('<?= $this->Url->build("/" . $event->event_description->img_path) ?>');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 20rem">
    <div class="bg-dark w-100 event-presentation p-1 blur-background bg-opacity-75 text-white">
        <div class="d-flex align-items-center justify-content-between ">
            <h4 class="w-100 z-index-100 px-2 text-white animate__animated animate__bounceInLeft">
                <span class="fw-bolder"><?= $event->event_description->title ?></span>
            </h4>
            <span
                class="badge rounded-pill shadow animate__animated animate__bounceInRight bg-<?= $event->event_type->css_class ?>"><?= $event->event_type->name ?></span>
        </div>
        <div class="animate__animated px-2 animate__bounceInLeft"
             style="max-height: 1.75rem;display: -webkit-box;overflow: hidden; -webkit-line-clamp: 1;-webkit-box-orient: vertical;">
            <?= $event->event_description->description ?>
        </div>
    </div>
</div>
<div class="row m-2">
    <?php if ($event->event_description->details) { ?>
        <div class="col-sm-12 my-1 col-md-6 col-lg-6 text-light">
            <?= html_entity_decode($event->event_description->details) ?>
        </div>
    <?php } ?>
    <div class="col-sm-12 my-1 col-md-6 col-lg-6 border-dark border rounded h-100 p-0">
        <div style="height: 20rem; width: 100%" class="bg-dark bg-opacity-75 rounded" id="map"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var map = L.map('map', {
            center: [<?= $event->event_description->posX ?>, <?= $event->event_description->posY ?>],
            zoom: 17
        });
        var imageUrl = '<?= $this->Url->Build("/img/gta5mapPlusPericoV2.svg") ?>',
            imageBounds = [
                [40.712216, -74.22655],
                [40.773941, -74.12544]
            ];
        L.imageOverlay(imageUrl, imageBounds).addTo(map);
        $(".leaflet-control-zoom-in").addClass("btn p-0 btn-warning border border-secondary shadow bg-warning rounded").html('<i class="bi bi-plus-circle-dotted"></i>');
        $(".leaflet-control-zoom-out").addClass("btn p-0 btn-warning border border-secondary shadow bg-warning mt-1 rounded").html('<i class="bi bi-dash-circle-dotted"></i>');

        var EnchereIcon = L.icon({
            iconUrl: '<?= $this->url->build('/img/mapIcon/enchere.png') ?>',
            iconSize: [30, 30], // size of the icon
        });
        var RaceIcon = L.icon({
            iconUrl: '<?= $this->url->build('/img/mapIcon/race.png') ?>',
            iconSize: [30, 30], // size of the icon
        });
        var TombolaIcon = L.icon({
            iconUrl: '<?= $this->url->build('/img/mapIcon/party.png') ?>',
            iconSize: [30, 30], // size of the icon
        });
        L.marker([<?= $event->event_description->posX ?>, <?= $event->event_description->posY ?>], {icon: TombolaIcon}).addTo(map).bindPopup("Vente de ticket de tombolla trop chère !");
        console.log(<?= $event->event_description->posX ?>, <?= $event->event_description->posY ?>);
        $("#map").on('click', function (ev) {
            var latlng = map.mouseEventToLatLng(ev.originalEvent);
            console.log(latlng.lat + ', ' + latlng.lng);
        });

    });
</script>
<div class="d-flex justify-content-evenly align-items-center flex-wrap flex-shrink-1 px-5 flex-grow-1 mt-3">
<?php
$num = 1;
foreach ($lots as $lot) { ?>
    <div class="bg-dark w-25 text-secondary shadow p-3 m-3 d-flex justify-content-between align-items-center rounded">
        <?php if ($event->event_type->slug == "enchere" || $event->event_type->slug == "enchere-illegal") { ?>
            <span class="d-flex justify-content-between flex-column">
                <span class="h5 text-light">LOT #<?= $num ?> : <?= $lot->name ?></span>
                <span>Prix de départ : <?= $lot->price_depart ?>$</span>
            </span>
            <i class="bi bi-basket2 h1"></i>
        <?php }else{ ?>
            <span>
                 <span class="h5 text-light">
                     LOT #<?= $num ?> : <?= $lot->name ?>
                 </span>
            </span>
            <i class="bi bi-gift-fill h1"></i>
        <?php } ?>
    </div>
    <?php
    $num++;
} ?>
</div>
