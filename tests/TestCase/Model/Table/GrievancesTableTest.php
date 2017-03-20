<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrievancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrievancesTable Test Case
 */
class GrievancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrievancesTable
     */
    public $Grievances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grievances'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Grievances') ? [] : ['className' => 'App\Model\Table\GrievancesTable'];
        $this->Grievances = TableRegistry::get('Grievances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grievances);

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
