<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Event'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="events view content">
            <h3><?= h($event->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $event->has('id') ? $this->Html->link($event->id->id, ['controller' => 'Organisations', 'action' => 'view', $event->id->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $event->has('id') ? $this->Html->link($event->id->name, ['controller' => 'EventsTypes', 'action' => 'view', $event->id->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $event->has('id') ? $this->Html->link($event->id->title, ['controller' => 'EventsDescriptions', 'action' => 'view', $event->id->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($event->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($event->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($event->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($event->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($event->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Events Lots') ?></h4>
                <?php if (!empty($event->id)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Id Event') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Somme') ?></th>
                            <th><?= __('Is Money') ?></th>
                            <th><?= __('Is Locked') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Price Depart') ?></th>
                            <th><?= __('Price Min') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($event->id as $eventsLots) : ?>
                        <tr>
                            <td><?= h($eventsLots->id) ?></td>
                            <td><?= h($eventsLots->id_event) ?></td>
                            <td><?= h($eventsLots->name) ?></td>
                            <td><?= h($eventsLots->somme) ?></td>
                            <td><?= h($eventsLots->is_money) ?></td>
                            <td><?= h($eventsLots->is_locked) ?></td>
                            <td><?= h($eventsLots->created) ?></td>
                            <td><?= h($eventsLots->modified) ?></td>
                            <td><?= h($eventsLots->price_depart) ?></td>
                            <td><?= h($eventsLots->price_min) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EventsLots', 'action' => 'view', $eventsLots->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EventsLots', 'action' => 'edit', $eventsLots->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventsLots', 'action' => 'delete', $eventsLots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsLots->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Events Rights') ?></h4>
                <?php if (!empty($event->id)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Id Event') ?></th>
                            <th><?= __('Id User') ?></th>
                            <th><?= __('Id Role') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Level') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($event->id as $eventsRights) : ?>
                        <tr>
                            <td><?= h($eventsRights->id) ?></td>
                            <td><?= h($eventsRights->id_event) ?></td>
                            <td><?= h($eventsRights->id_user) ?></td>
                            <td><?= h($eventsRights->id_role) ?></td>
                            <td><?= h($eventsRights->name) ?></td>
                            <td><?= h($eventsRights->level) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'EventsRights', 'action' => 'view', $eventsRights->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'EventsRights', 'action' => 'edit', $eventsRights->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventsRights', 'action' => 'delete', $eventsRights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRights->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
