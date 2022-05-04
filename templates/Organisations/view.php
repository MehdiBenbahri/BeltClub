<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>

<div class="column-responsive column-80">
    <div class="organisations view content">
        <div class="border-secondary rounded border m-5">
            <div class=" d-flex justify-content-between align-items-center">
                <h4 class="text-secondary ms-3"><?= $organisation->nom ?> <?= $organisation->is_legal ? '' : '<div class="text-danger text-uppercase"> Organisation illégal <i class="bi bi-radioactive"></i></div>' ?></h4>
                <img style="border-radius: 20rem;" class="m-3" width="100rem" height="auto" src="<?= $organisation->img_orga ?>"
                     alt="logo de l'organisation <?= $organisation->nom ?>">
            </div>
            <div class="m-2 p-2 rounded" id="events-table"></div>
            <div class="m-3 p-3 bg-dark rounded calendar-scroller" id='calendar'>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            allDaySlot: false,
            initialView: 'timeGridWeek',
            themeSystem: 'standard',
            locale: 'fr'
        });
        calendar.render();
        $(".fc-col-header-cell-cushion").each(function(){
            var date = moment($(this).parent(".fc-scrollgrid-sync-inner").parent("th.fc-col-header-cell"));
           $(this).html();
           console.log(date.format("DD/MM/YYYY"));
        });
    });
</script>
