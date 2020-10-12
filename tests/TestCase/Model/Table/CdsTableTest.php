<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CdsTable Test Case
 */
class CdsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CdsTable
     */
    public $Cds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cds',
        'app.Users',
        'app.Genres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cds') ? [] : ['className' => CdsTable::class];
        $this->Cds = TableRegistry::getTableLocator()->get('Cds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cds);

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
