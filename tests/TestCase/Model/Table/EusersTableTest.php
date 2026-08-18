<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EusersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EusersTable Test Case
 */
class EusersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EusersTable
     */
    protected $Eusers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Eusers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Eusers') ? [] : ['className' => EusersTable::class];
        $this->Eusers = $this->getTableLocator()->get('Eusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Eusers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EusersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
