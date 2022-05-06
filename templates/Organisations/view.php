<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\User $roles
 */
?>

<input id="EventListOrgaPath" type="hidden"
       value="<?= $this->url->Build("/events/get-events-organisation/" . $user->organisation->id) ?>">
<div class="column-responsive column-80">
    <div class="organisations view content">
        <div class="border-secondary rounded border m-5">
            <div class=" d-flex justify-content-between mt-2 align-items-center">
                <h4 class="text-secondary ms-3 mt-2">
                    <span class="text-uppercase"><?= $organisation->nom ?></span>
                    <?= $organisation->is_legal ? '' :
                        '<div class="text-danger text-uppercase"> Organisation illégal <i class="bi bi-radioactive"></i></div>'
                    ?>
                </h4>
                <img style="border-radius: 20rem;" class="m-3" width="100rem" height="auto"
                     src="<?= $organisation->img_orga ?>"
                     alt="logo de l'organisation <?= $organisation->nom ?>">
            </div>
            <hr class="text-light">
            <div class="row">
                <div class="col-lg-6 px-4 col-md-12 col-sm-12">
                    <h3 class="text-uppercase">Liste des membres</h3>
                    <table id="table-member" class="table table-dark">
                        <thead>
                        <tr class="text-center">
                            <th>Nom</th>
                            <th>Role</th>
                            <th>Niveau</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($organisation->users as $user_orga) {
                            ?>
                            <tr class="text-center">
                                <td class="border-secondary <?= $user_orga->active && $user_orga->role->active  ? '' : 'text-muted' ?> border-start-0"><?= h($user_orga->name) ?></td>
                                <td class="border-secondary <?= $user_orga->active && $user_orga->role->active ? '' : 'text-muted' ?> border-start"><?= h($user_orga->role->name) ?></td>
                                <td class="border-secondary <?= $user_orga->active && $user_orga->role->active ? '' : 'text-muted' ?> border-start">
                                    <?php if ($user_orga->active && $user_orga->role->active) { ?>
                                        <span class="badge bg-warning text-dark"><?= $user_orga->role->level ?></span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary text-dark"><?= $user_orga->role->level ?></span>
                                    <?php } ?>
                                </td>
                                <td class="d-flex justify-content-around align-items-center border-secondary border-start">
                                    <?php if ($user_orga->active) { ?>
                                        <a href="<?= !\App\Controller\UsersController::isAllowedToEditOrDelete($user_orga) ? '#' : $this->Url->build("/users/delete/" . $user_orga->id) ?>"
                                           class="btn  <?= !\App\Controller\UsersController::isAllowedToEditOrDelete($user_orga) ? 'disabled' : '' ?> btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= !\App\Controller\UsersController::isAllowedToEditOrDelete($user_orga) ? '#' : $this->Url->build("/users/reabilite/" . $user_orga->id) ?>"
                                           class="btn  <?= !\App\Controller\UsersController::isAllowedToEditOrDelete($user_orga) ? 'disabled' : '' ?> btn-sm btn-success">
                                            <i class="bi bi-person-check-fill"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 px-4 col-md-12 col-sm-12">
                    <h3 class="text-uppercase">Liste des rôles</h3>
                    <table id="table-member" class="table table-dark">
                        <thead>
                        <tr class="text-center">
                            <th>Role</th>
                            <th>Niveau du rôle</th>
                            <th>Activer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($roles as $role) {
                            ?>
                            <tr class="text-center">
                                <td class="border-secondary <?= $role->role->active ? '' : 'text-muted' ?> border-start-0"><?= h($role->role->name) ?></td>
                                <td class="border-secondary <?= $role->role->active ? '' : 'text-muted' ?> border-start">
                                    <?php if ($role->role->active) { ?>
                                        <span class="badge bg-warning text-dark"><?= $role->role->level ?></span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary text-dark"><?= $role->role->level ?></span>
                                    <?php } ?>
                                </td>
                                <td class="d-flex justify-content-around align-items-center border-secondary border-start">
                                    <?php if (!$role->role->active) { ?>
                                        <a href="<?= !$user->role->is_admin ? '#' : $this->Url->build("/roles/reabilite/" . $role->role->id) ?>"
                                           class="btn  <?= !$user->role->is_admin ? 'disabled' : '' ?> btn-sm btn-danger">
                                            <i class="bi bi-x-lg"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= !$user->role->is_admin ? '#' : $this->Url->build("/roles/delete/" . $role->role->id) ?>"
                                           class="btn  <?= !$user->role->is_admin ? 'disabled' : '' ?> btn-sm btn-success">
                                            <i class="bi bi-check-lg"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 col-12">
                    <h3 class="text-uppercase">évènements</h3>
                    <div class="bg-dark p-3 rounded calendar-scroller" id='calendar'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar:{
                start: 'dayGridMonth,timeGridWeek,listWeek',
                center: 'title',
                end: 'today prev,next'
            },
            allDaySlot: false,
            initialView: 'listWeek',
            themeSystem: 'standard',
            locale: 'fr',
            events: $("#EventListOrgaPath").val(),
            eventDidMount: function (eventInfo) {
                console.log(eventInfo.event._def.publicId);
                if (eventInfo.el.querySelector('.fc-list-event-title')){
                    eventInfo.el.querySelector('.fc-list-event-title').innerHTML += '<a target="_blank" href="<?= $this->Url->build("/events/view/") ?>' + eventInfo.event._def.publicId + '" type="button" class="btn shadow me-md-0 me-sm-5 btn-sm btn-warning"><i class="bi bi-three-dots"></i></a>';
                }
            }

        });

        calendar.render();
        $(".fc-col-header-cell-cushion").each(function () {
            var date = moment($(this).parent(".fc-scrollgrid-sync-inner").parent("th.fc-col-header-cell"));
            $(this).html();
        });
    });
    // add the responsive classes after page initialization
    window.onload = function () {
        //$('.fc-toolbar').addClass('d-flex justify-content-between flex-column align-items-center');
        //$('.fc-toolbar-chunk').addClass('d-flex justify-content-between align-items-center');
    };

</script>
<?php
$this->append('css');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


<?php
echo $this->Html->css('table');
$this->end();
?>
<?php
$this->append('script');
echo $this->Html->script('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js');
?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<?php
$this->end();
?>
