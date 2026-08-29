<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessoresTable Test Case
 */
class ProfessoresTableTest extends TestCase
{
    protected $Professores;

    protected array $fixtures = [
        'app.Professores',
        'app.Essextensoes',
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Professores') ? [] : ['className' => ProfessoresTable::class];
        $this->Professores = $this->getTableLocator()->get('Professores', $config);
    }

    protected function tearDown(): void
    {
        unset($this->Professores);

        parent::tearDown();
    }

    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
