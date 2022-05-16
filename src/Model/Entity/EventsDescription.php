<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsDescription Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $img_path
 * @property int $is_complete
 * @property float|null $posX
 * @property float|null $posY
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class EventsDescription extends Entity
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
        'title' => true,
        'description' => true,
        'img_path' => true,
        'is_complete' => true,
        'posX' => true,
        'posY' => true,
        'created' => true,
        'modified' => true,
    ];
}
