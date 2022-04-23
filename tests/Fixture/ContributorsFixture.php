<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContributorsFixture
 */
class ContributorsFixture extends TestFixture
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
                'id_users' => 1,
                'id_events' => 1,
                'somme_reverse' => 1,
                'somme_du' => 1,
                'pourcentage' => 1,
                'created' => '2022-04-22 21:01:26',
                'modified' => '2022-04-22 21:01:26',
            ],
        ];
        parent::init();
    }
}
