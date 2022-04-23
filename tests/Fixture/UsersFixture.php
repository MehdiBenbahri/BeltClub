<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'id_role' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'tel_ingame' => 'Lorem ipsum dolor sit amet',
                'discord_id' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'validated_account' => 1,
                'created' => '2022-04-22 21:03:45',
                'modified' => '2022-04-22 21:03:45',
            ],
        ];
        parent::init();
    }
}
