<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformacoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformacoesTable Test Case
 */
class InformacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformacoesTable
     */
    protected $Informacoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Informacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Informacoes') ? [] : ['className' => InformacoesTable::class];
        $this->Informacoes = $this->getTableLocator()->get('Informacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Informacoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InformacoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
