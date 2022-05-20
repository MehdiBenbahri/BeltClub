<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnoncesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnoncesTable Test Case
 */
class AnnoncesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnoncesTable
     */
    protected $Annonces;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Annonces',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Annonces') ? [] : ['className' => AnnoncesTable::class];
        $this->Annonces = $this->getTableLocator()->get('Annonces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Annonces);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AnnoncesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
