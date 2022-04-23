<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsTypesFixture
 */
class EventsTypesFixture extends TestFixture
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
                'slug' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'is_legal' => 1,
                'created' => '2022-04-22 21:03:04',
                'modified' => '2022-04-22 21:03:04',
            ],
        ];
        parent::init();
    }
}
