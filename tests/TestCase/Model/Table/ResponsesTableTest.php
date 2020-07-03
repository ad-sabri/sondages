<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponsesTable Test Case
 */
class ResponsesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponsesTable
     */
    protected $Responses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Responses',
        'app.Surveys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Responses') ? [] : ['className' => ResponsesTable::class];
        $this->Responses = TableRegistry::getTableLocator()->get('Responses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Responses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
