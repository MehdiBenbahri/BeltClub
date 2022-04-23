<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsLotsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsLotsTable Test Case
 */
class EventsLotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsLotsTable
     */
    protected $EventsLots;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EventsLots',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventsLots') ? [] : ['className' => EventsLotsTable::class];
        $this->EventsLots = $this->getTableLocator()->get('EventsLots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventsLots);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventsLotsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
