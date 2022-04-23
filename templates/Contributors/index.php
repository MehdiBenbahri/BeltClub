<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contributor[]|\Cake\Collection\CollectionInterface $contributors
 */
?>
<div class="contributors index content">
    <?= $this->Html->link(__('New Contributor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contributors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_users') ?></th>
                    <th><?= $this->Paginator->sort('id_events') ?></th>
                    <th><?= $this->Paginator->sort('somme_reverse') ?></th>
                    <th><?= $this->Paginator->sort('somme_du') ?></th>
                    <th><?= $this->Paginator->sort('pourcentage') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contributors as $contributor): ?>
                <tr>
                    <td><?= $this->Number->format($contributor->id) ?></td>
                    <td><?= $this->Number->format($contributor->id_users) ?></td>
                    <td><?= $this->Number->format($contributor->id_events) ?></td>
                    <td><?= $contributor->somme_reverse === null ? '' : $this->Number->format($contributor->somme_reverse) ?></td>
                    <td><?= $contributor->somme_du === null ? '' : $this->Number->format($contributor->somme_du) ?></td>
                    <td><?= $contributor->pourcentage === null ? '' : $this->Number->format($contributor->pourcentage) ?></td>
                    <td><?= h($contributor->created) ?></td>
                    <td><?= h($contributor->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contributor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contributor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contributor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributor->id)]) ?>
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
