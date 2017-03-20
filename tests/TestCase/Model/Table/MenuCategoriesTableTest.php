<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuCategoriesTable Test Case
 */
class MenuCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuCategoriesTable
     */
    public $MenuCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('MenuCategories') ? [] : ['className' => 'App\Model\Table\MenuCategoriesTable'];
        $this->MenuCategories = TableRegistry::get('MenuCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuCategories);

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
