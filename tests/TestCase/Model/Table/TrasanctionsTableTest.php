<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrasanctionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrasanctionsTable Test Case
 */
class TrasanctionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrasanctionsTable
     */
    public $Trasanctions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trasanctions',
        'app.users',
        'app.grievances',
        'app.logins',
        'app.notifications',
        'app.departments',
        'app.levels',
        'app.grievance_histories',
        'app.grievance_attachments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Trasanctions') ? [] : ['className' => 'App\Model\Table\TrasanctionsTable'];
        $this->Trasanctions = TableRegistry::get('Trasanctions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trasanctions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
