<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsDescriptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsDescriptionsTable Test Case
 */
class EventsDescriptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsDescriptionsTable
     */
    protected $EventsDescriptions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EventsDescriptions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventsDescriptions') ? [] : ['className' => EventsDescriptionsTable::class];
        $this->EventsDescriptions = $this->getTableLocator()->get('EventsDescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventsDescriptions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventsDescriptionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
