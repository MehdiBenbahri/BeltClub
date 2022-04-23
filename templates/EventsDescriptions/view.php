<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsDescription $eventsDescription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Events Description'), ['action' => 'edit', $eventsDescription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Events Description'), ['action' => 'delete', $eventsDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsDescription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events Descriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Events Description'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsDescriptions view content">
            <h3><?= h($eventsDescription->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($eventsDescription->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Img Path') ?></th>
                    <td><?= h($eventsDescription->img_path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventsDescription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Event') ?></th>
                    <td><?= $this->Number->format($eventsDescription->id_event) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Complete') ?></th>
                    <td><?= $this->Number->format($eventsDescription->is_complete) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($eventsDescription->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($eventsDescription->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($eventsDescription->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
