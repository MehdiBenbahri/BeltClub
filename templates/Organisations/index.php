<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation[]|\Cake\Collection\CollectionInterface $organisations
 */
?>
<div class="organisations index content">
    <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Organisations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('img_orga') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organisations as $organisation): ?>
                <tr>
                    <td><?= $this->Number->format($organisation->id) ?></td>
                    <td><?= h($organisation->nom) ?></td>
                    <td><?= h($organisation->slug) ?></td>
                    <td><?= h($organisation->img_orga) ?></td>
                    <td><?= h($organisation->created) ?></td>
                    <td><?= h($organisation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id)]) ?>
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
