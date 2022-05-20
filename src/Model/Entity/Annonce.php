<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Annonce Entity
 *
 * @property int $id
 * @property int $id_user
 * @property string $title
 * @property string $description
 * @property int $is_negociable
 */
class Annonce extends Entity
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
        'id_user' => true,
        'title' => true,
        'description' => true,
        'is_negociable' => true,
    ];
}
