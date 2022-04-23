<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 */
class EventsFixture extends TestFixture
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
                'id_event_type' => 1,
                'id_event_description' => 1,
                'start_date' => '2022-04-23 11:40:26',
                'end_date' => '2022-04-23 11:40:26',
                'created' => '2022-04-23 11:40:26',
                'modified' => '2022-04-23 11:40:26',
            ],
        ];
        parent::init();
    }
}
