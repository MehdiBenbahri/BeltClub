<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contributor $contributor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contributor'), ['action' => 'edit', $contributor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contributor'), ['action' => 'delete', $contributor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contributors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contributor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contributors view content">
            <h3><?= h($contributor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contributor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Users') ?></th>
                    <td><?= $this->Number->format($contributor->id_users) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Events') ?></th>
                    <td><?= $this->Number->format($contributor->id_events) ?></td>
                </tr>
                <tr>
                    <th><?= __('Somme Reverse') ?></th>
                    <td><?= $contributor->somme_reverse === null ? '' : $this->Number->format($contributor->somme_reverse) ?></td>
                </tr>
                <tr>
                    <th><?= __('Somme Du') ?></th>
                    <td><?= $contributor->somme_du === null ? '' : $this->Number->format($contributor->somme_du) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pourcentage') ?></th>
                    <td><?= $contributor->pourcentage === null ? '' : $this->Number->format($contributor->pourcentage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contributor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contributor->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
