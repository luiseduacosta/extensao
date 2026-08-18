<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtensaoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtensaoTable Test Case
 */
class ExtensaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtensaoTable
     */
    protected $Extensao;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Extensao',
        'app.Docentes',
        'app.Taes',
        'app.Segmentos',
        'app.Situacaopr5s',
        'app.Extensionista',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Extensao') ? [] : ['className' => ExtensaoTable::class];
        $this->Extensao = $this->getTableLocator()->get('Extensao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Extensao);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtensaoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtensaoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
