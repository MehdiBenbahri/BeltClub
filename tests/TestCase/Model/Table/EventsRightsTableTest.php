<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsRightsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsRightsTable Test Case
 */
class EventsRightsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsRightsTable
     */
    protected $EventsRights;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EventsRights',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventsRights') ? [] : ['className' => EventsRightsTable::class];
        $this->EventsRights = $this->getTableLocator()->get('EventsRights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventsRights);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventsRightsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
