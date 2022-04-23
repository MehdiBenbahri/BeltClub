<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContributorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContributorsTable Test Case
 */
class ContributorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContributorsTable
     */
    protected $Contributors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Contributors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contributors') ? [] : ['className' => ContributorsTable::class];
        $this->Contributors = $this->getTableLocator()->get('Contributors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contributors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContributorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
