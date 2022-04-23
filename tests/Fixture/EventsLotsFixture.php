<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsLotsFixture
 */
class EventsLotsFixture extends TestFixture
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
                'id_events' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'somme' => 1,
                'is_money' => 1,
                'is_locked' => 1,
                'created' => '2022-04-22 21:02:51',
                'modified' => '2022-04-22 21:02:51',
                'price_depart' => 1,
                'price_min' => 1,
            ],
        ];
        parent::init();
    }
}
