<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocentesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocentesTable Test Case
 */
class DocentesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocentesTable
     */
    protected $Docentes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Docentes',
        'app.Ementas',
        'app.ExtensaoOld',
        'app.Extensoes',
        'app.Planejamentos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Docentes') ? [] : ['className' => DocentesTable::class];
        $this->Docentes = $this->getTableLocator()->get('Docentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Docentes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocentesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
