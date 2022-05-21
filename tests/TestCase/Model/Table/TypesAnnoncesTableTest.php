<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesAnnoncesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesAnnoncesTable Test Case
 */
class TypesAnnoncesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesAnnoncesTable
     */
    protected $TypesAnnonces;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TypesAnnonces',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TypesAnnonces') ? [] : ['className' => TypesAnnoncesTable::class];
        $this->TypesAnnonces = $this->getTableLocator()->get('TypesAnnonces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TypesAnnonces);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TypesAnnoncesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
