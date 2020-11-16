<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenreFamiliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenreFamiliesTable Test Case
 */
class GenreFamiliesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GenreFamiliesTable
     */
    public $GenreFamilies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GenreFamilies',
        'app.GenreSubfamilies',
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
        $config = TableRegistry::getTableLocator()->exists('GenreFamilies') ? [] : ['className' => GenreFamiliesTable::class];
        $this->GenreFamilies = TableRegistry::getTableLocator()->get('GenreFamilies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GenreFamilies);

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
