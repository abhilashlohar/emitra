<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfferingOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfferingOptionsTable Test Case
 */
class OfferingOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfferingOptionsTable
     */
    public $OfferingOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offering_options',
        'app.offerings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OfferingOptions') ? [] : ['className' => 'App\Model\Table\OfferingOptionsTable'];
        $this->OfferingOptions = TableRegistry::get('OfferingOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OfferingOptions);

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
