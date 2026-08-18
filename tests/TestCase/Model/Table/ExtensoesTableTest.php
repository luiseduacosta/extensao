<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtensoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtensoesTable Test Case
 */
class ExtensoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtensoesTable
     */
    protected $Extensoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Extensoes',
        'app.Extensionistas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Extensoes') ? [] : ['className' => ExtensoesTable::class];
        $this->Extensoes = $this->getTableLocator()->get('Extensoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Extensoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtensoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtensoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
