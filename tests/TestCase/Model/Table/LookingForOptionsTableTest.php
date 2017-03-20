<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LookingForOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LookingForOptionsTable Test Case
 */
class LookingForOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LookingForOptionsTable
     */
    public $LookingForOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.looking_for_options',
        'app.looking_fors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LookingForOptions') ? [] : ['className' => 'App\Model\Table\LookingForOptionsTable'];
        $this->LookingForOptions = TableRegistry::get('LookingForOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LookingForOptions);

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
