<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenreSubfamiliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenreSubfamiliesTable Test Case
 */
class GenreSubfamiliesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GenreSubfamiliesTable
     */
    public $GenreSubfamilies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GenreSubfamilies',
        'app.GenreFamilies',
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
        $config = TableRegistry::getTableLocator()->exists('GenreSubfamilies') ? [] : ['className' => GenreSubfamiliesTable::class];
        $this->GenreSubfamilies = TableRegistry::getTableLocator()->get('GenreSubfamilies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GenreSubfamilies);

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
