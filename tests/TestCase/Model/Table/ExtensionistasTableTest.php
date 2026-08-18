<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtensionistasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtensionistasTable Test Case
 */
class ExtensionistasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtensionistasTable
     */
    protected $Extensionistas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Extensionistas',
        'app.Alunosnovos',
        'app.Extensoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Extensionistas') ? [] : ['className' => ExtensionistasTable::class];
        $this->Extensionistas = $this->getTableLocator()->get('Extensionistas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Extensionistas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtensionistasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtensionistasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
