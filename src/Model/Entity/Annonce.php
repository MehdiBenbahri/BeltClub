<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Annonce Entity
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_type_annonce
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $is_negociable
 * @property int $is_legal
 * @property int $is_complete
 * @property string $posX
 * @property string $posY
 *
 * @property \App\Model\Entity\User $user
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
        'id_type_annonce' => true,
        'title' => true,
        'description' => true,
        'price' => true,
        'is_negociable' => true,
        'is_legal' => true,
        'is_complete' => true,
        'posX' => true,
        'posY' => true,
        'user' => true,
    ];
}
