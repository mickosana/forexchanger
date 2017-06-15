<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\orders_tblTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\orders_tblTable Test Case
 */
class orders_tblTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\orders_tblTable
     */
    public $orders_tbl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.orders_tbl'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('orders_tbl') ? [] : ['className' => 'App\Model\Table\orders_tblTable'];
        $this->orders_tbl = TableRegistry::get('orders_tbl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->orders_tbl);

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
