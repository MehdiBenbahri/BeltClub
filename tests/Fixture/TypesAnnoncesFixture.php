<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TypesAnnoncesFixture
 */
class TypesAnnoncesFixture extends TestFixture
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
                'nom' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'is_legal' => 1,
                'created' => '2022-05-21 21:51:38',
                'modified' => '2022-05-21 21:51:38',
            ],
        ];
        parent::init();
    }
}
