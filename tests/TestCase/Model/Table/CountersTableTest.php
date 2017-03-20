<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountersTable Test Case
 */
class CountersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CountersTable
     */
    public $Counters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.counters',
        'app.menu_categories',
        'app.menu_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Counters') ? [] : ['className' => 'App\Model\Table\CountersTable'];
        $this->Counters = TableRegistry::get('Counters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Counters);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
