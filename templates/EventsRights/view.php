<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsRight $eventsRight
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Events Right'), ['action' => 'edit', $eventsRight->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Events Right'), ['action' => 'delete', $eventsRight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRight->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events Rights'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Events Right'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsRights view content">
            <h3><?= h($eventsRight->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($eventsRight->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventsRight->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Event') ?></th>
                    <td><?= $this->Number->format($eventsRight->id_event) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id User') ?></th>
                    <td><?= $eventsRight->id_user === null ? '' : $this->Number->format($eventsRight->id_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Role') ?></th>
                    <td><?= $eventsRight->id_role === null ? '' : $this->Number->format($eventsRight->id_role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $this->Number->format($eventsRight->level) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
