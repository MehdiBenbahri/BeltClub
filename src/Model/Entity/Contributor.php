<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contributor Entity
 *
 * @property int $id
 * @property int $id_users
 * @property int $id_events
 * @property int|null $somme_reverse
 * @property int|null $somme_du
 * @property float|null $pourcentage
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Contributor extends Entity
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
        'id_users' => true,
        'id_events' => true,
        'somme_reverse' => true,
        'somme_du' => true,
        'pourcentage' => true,
        'created' => true,
        'modified' => true,
    ];
}
