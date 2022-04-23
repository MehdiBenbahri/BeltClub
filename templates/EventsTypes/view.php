<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsType $eventsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Events Type'), ['action' => 'edit', $eventsType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Events Type'), ['action' => 'delete', $eventsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Events Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventsTypes view content">
            <h3><?= h($eventsType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($eventsType->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($eventsType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventsType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Legal') ?></th>
                    <td><?= $this->Number->format($eventsType->is_legal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($eventsType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($eventsType->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
