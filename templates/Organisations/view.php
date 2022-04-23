<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Organisation'), ['action' => 'edit', $organisation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Organisation'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="organisations view content">
            <h3><?= h($organisation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($organisation->nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($organisation->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Img Orga') ?></th>
                    <td><?= h($organisation->img_orga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($organisation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($organisation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($organisation->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
