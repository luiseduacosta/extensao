<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Situacaopr5Table;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Situacaopr5Table Test Case
 */
class Situacaopr5TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\Situacaopr5Table
     */
    protected $Situacaopr5;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Situacaopr5',
        'app.Extensao',
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
        $config = $this->getTableLocator()->exists('Situacaopr5') ? [] : ['className' => Situacaopr5Table::class];
        $this->Situacaopr5 = $this->getTableLocator()->get('Situacaopr5', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Situacaopr5);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\Situacaopr5Table::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
