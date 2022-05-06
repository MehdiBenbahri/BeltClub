<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsRight Entity
 *
 * @property int $id
 * @property int $id_event
 * @property int|null $id_user
 * @property int|null $id_role
 * @property string $name
 * @property int $level
 */
class EventsRight extends Entity
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
        '*',
        'id_event' => true,
        'id_user' => true,
        'id_role' => true,
        'name' => true,
        'level' => true,
    ];
}
