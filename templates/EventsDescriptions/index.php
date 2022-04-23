<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsDescription[]|\Cake\Collection\CollectionInterface $eventsDescriptions
 */
?>
<div class="eventsDescriptions index content">
    <?= $this->Html->link(__('New Events Description'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Events Descriptions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_event') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('img_path') ?></th>
                    <th><?= $this->Paginator->sort('is_complete') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventsDescriptions as $eventsDescription): ?>
                <tr>
                    <td><?= $this->Number->format($eventsDescription->id) ?></td>
                    <td><?= $this->Number->format($eventsDescription->id_event) ?></td>
                    <td><?= h($eventsDescription->title) ?></td>
                    <td><?= h($eventsDescription->img_path) ?></td>
                    <td><?= $this->Number->format($eventsDescription->is_complete) ?></td>
                    <td><?= h($eventsDescription->created) ?></td>
                    <td><?= h($eventsDescription->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $eventsDescription->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsDescription->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsDescription->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
