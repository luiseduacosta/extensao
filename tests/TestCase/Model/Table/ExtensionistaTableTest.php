<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtensionistaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtensionistaTable Test Case
 */
class ExtensionistaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtensionistaTable
     */
    protected $Extensionista;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Extensionista',
        'app.Alunonovos',
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
        $config = $this->getTableLocator()->exists('Extensionista') ? [] : ['className' => ExtensionistaTable::class];
        $this->Extensionista = $this->getTableLocator()->get('Extensionista', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Extensionista);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExtensionistaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExtensionistaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
