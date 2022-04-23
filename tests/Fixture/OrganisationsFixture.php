<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrganisationsFixture
 */
class OrganisationsFixture extends TestFixture
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
                'slug' => 'Lorem ip',
                'img_orga' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-22 21:03:28',
                'modified' => '2022-04-22 21:03:28',
            ],
        ];
        parent::init();
    }
}
