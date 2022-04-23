<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsLot Entity
 *
 * @property int $id
 * @property int $id_events
 * @property string $name
 * @property int|null $somme
 * @property int $is_money
 * @property int $is_locked
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $price_depart
 * @property int|null $price_min
 */
class EventsLot extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id_events' => true,
        'name' => true,
        'somme' => true,
        'is_money' => true,
        'is_locked' => true,
        'created' => true,
        'modified' => true,
        'price_depart' => true,
        'price_min' => true,
    ];
}
