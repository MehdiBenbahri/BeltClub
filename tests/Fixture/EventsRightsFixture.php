<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsRightsFixture
 */
class EventsRightsFixture extends TestFixture
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
                'id_event' => 1,
                'id_user' => 1,
                'id_role' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'level' => 1,
            ],
        ];
        parent::init();
    }
}
