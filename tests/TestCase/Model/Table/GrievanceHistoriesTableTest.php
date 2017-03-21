<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrievanceHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrievanceHistoriesTable Test Case
 */
class GrievanceHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrievanceHistoriesTable
     */
    public $GrievanceHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grievance_histories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GrievanceHistories') ? [] : ['className' => 'App\Model\Table\GrievanceHistoriesTable'];
        $this->GrievanceHistories = TableRegistry::get('GrievanceHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GrievanceHistories);

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
