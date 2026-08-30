<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocentesTable;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\DocentesTable Test Case
 */
class DocentesTableTest extends TestCase
{
    protected DocentesTable $Docentes;

    public function setUp(): void
    {
        parent::setUp();
        $this->Docentes = new DocentesTable();
    }

    public function tearDown(): void
    {
        unset($this->Docentes);
        parent::tearDown();
    }

    public function testValidationDefault(): void
    {
        $validator = $this->Docentes->validationDefault(new Validator());

        $errors = $validator->validate([
            'nome' => 'Docente Teste',
            'siape' => 1234567,
            'email' => 'docente@test.com',
            'status' => 'ativo',
            'estagiarios_count' => 3,
        ]);
        $this->assertEmpty($errors);

        $errors = $validator->validate([
            'nome' => '',
            'siape' => 1234567,
        ]);
        $this->assertArrayHasKey('nome', $errors);

        $errors = $validator->validate([
            'nome' => 'Docente Teste',
            'status' => 'status-exceeding-length',
        ]);
        $this->assertArrayHasKey('status', $errors);
    }
}
