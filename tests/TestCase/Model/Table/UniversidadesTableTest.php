<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniversidadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniversidadesTable Test Case
 */
class UniversidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UniversidadesTable
     */
    protected $Universidades;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Universidades',
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
        $config = $this->getTableLocator()->exists('Universidades') ? [] : ['className' => UniversidadesTable::class];
        $this->Universidades = $this->getTableLocator()->get('Universidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Universidades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UniversidadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
