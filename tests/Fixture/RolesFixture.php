<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_organisation' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-05-07 17:24:55',
                'is_orga' => 1,
                'modified' => '2022-05-07 17:24:55',
                'active' => 1,
                'level' => 1,
                'is_admin' => 1,
            ],
        ];
        parent::init();
    }
}
