
<div class="border-dark rounded border ms-4 h-100">
    <div style="height: 32rem" class="rounded bg-dark bg-opacity-75" id="map"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var map = L.map('map', {
            center: [40.727, -74.181],
            zoom: 14.5
        });
        var imageUrl = '<?= $this->Url->Build("/img/gta5map.svg") ?>',
            imageBounds = [
                [40.712216, -74.22655],
                [40.773941, -74.12544]
            ];
        L.imageOverlay(imageUrl, imageBounds).addTo(map);
        $(".leaflet-control-zoom-in").addClass("btn p-0 btn-warning border border-secondary shadow bg-warning rounded").html('<i class="bi bi-plus-circle-dotted"></i>');
        $(".leaflet-control-zoom-out").addClass("btn p-0 btn-warning border border-secondary shadow bg-warning mt-1 rounded").html('<i class="bi bi-dash-circle-dotted"></i>');

        var PDMIcon = L.icon({
            iconUrl: '<?= $this->url->build('/img/mapIcon/enchere.png') ?>',
            iconSize:     [40, 40], // size of the icon
        });

        $("#map").on('click', function(ev){
            var latlng = map.mouseEventToLatLng(ev.originalEvent);
            console.log(latlng.lat + ', ' + latlng.lng);
            L.marker([latlng.lat, latlng.lng], {icon: PDMIcon}).addTo(map);
        });
    });
</script>
