<?php
/**
 * @var \App\Model\Entity\Event $events
 **/
?>
<div class="border-dark rounded border ms-4 h-100">
    <div style="height: 32rem" class="rounded bg-dark bg-opacity-75" id="map"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var map = L.map('map', {
            center: [40.727, -74.181],
            zoom: 14.5
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
        // L.marker([40.722868115037, -74.17288753140642], {icon: EnchereIcon}).addTo(map).bindPopup("Vente au enchère de voiture sportive classique");
        // L.marker([40.74940275339479, -74.16714676133186], {icon: RaceIcon}).addTo(map).bindPopup("Course à l'aéroport de Sandy Shore, devant le Nadir Nord");

        <?php
        if (!empty($events)) {
        foreach ($events as $event) {?>
            L.marker([ <?= $event->event_description->posX ?>,  <?= $event->event_description->posY ?>], {icon: TombolaIcon}).addTo(map).bindPopup("Vente de ticket de tombolla trop chère !");
            console.log(<?= $event->event_description->posX ?>,<?= $event->event_description->posY ?>);
        <?php }
        } ?>
        $("#map").on('click', function (ev) {
            var latlng = map.mouseEventToLatLng(ev.originalEvent);
            console.log(latlng.lat + ', ' + latlng.lng);
        });

    });
</script>
