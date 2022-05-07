<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property int $id_organisation
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $is_orga
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $active
 * @property int $level
 * @property int $is_admin
 *
 * @property \App\Model\Entity\Organisation $role
 */
class Role extends Entity
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
        'id_organisation' => true,
        'name' => true,
        'created' => true,
        'is_orga' => true,
        'modified' => true,
        'active' => true,
        'level' => true,
        'is_admin' => true,
        'role' => true,
    ];
}
