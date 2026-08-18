<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaesTable Test Case
 */
class TaesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TaesTable
     */
    protected $Taes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Taes',
        'app.ExtensaoOld',
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
        $config = $this->getTableLocator()->exists('Taes') ? [] : ['className' => TaesTable::class];
        $this->Taes = $this->getTableLocator()->get('Taes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Taes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TaesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
