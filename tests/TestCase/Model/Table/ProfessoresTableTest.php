<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessoresTable Test Case
 */
class ProfessoresTableTest extends TestCase
{
    protected array $fixtures = [
        'app.Professores',
        'app.Essextensoes',
    ];

    protected ProfessoresTable $Professores;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ProfessoresTable $table */
        $table = TableRegistry::getTableLocator()->get('Professores');
        $this->Professores = $table;
    }

    protected function tearDown(): void
    {
        unset($this->Professores);
        parent::tearDown();
    }

    public function testValidationNomeRequired(): void
    {
        $professor = $this->Professores->newEntity(['nome' => '']);
        $this->assertFalse($this->Professores->save($professor));
        $this->assertArrayHasKey('nome', $professor->getErrors());
    }

    public function testValidationNomeMaxLength(): void
    {
        $professor = $this->Professores->newEntity(['nome' => str_repeat('a', 201)]);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('nome', $errors);
        $this->assertArrayHasKey('maxLength', $errors['nome']);
    }

    public function testValidationSiapeRegex(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'siape' => 'abc']);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('siape', $errors);
        $this->assertArrayHasKey('regex', $errors['siape']);
    }

    public function testValidationStatusInList(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => 'bogus']);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('status', $errors);
        $this->assertArrayHasKey('inList', $errors['status']);
    }

    public function testValidationEmailFormat(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'email' => 'not-an-email']);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('email', $errors);
    }

    public function testValidationCurriculoLattesMaxLength(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'curriculolattes' => str_repeat('1', 51)]);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('curriculolattes', $errors);
        $this->assertArrayHasKey('maxLength', $errors['curriculolattes']);
    }

    public function testValidationAtualizacaoLattesDate(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'atualizacaolattes' => 'not-a-date']);
        $errors = $professor->getErrors();
        $this->assertArrayHasKey('atualizacaolattes', $errors);
        $this->assertArrayHasKey('date', $errors['atualizacaolattes']);
    }

    public function testBeforeMarshalNormalizesStatusAliases(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => 'active']);
        $this->assertSame('ativo', $professor->status);

        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => 'retired']);
        $this->assertSame('aposentado', $professor->status);

        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => 'inactive']);
        $this->assertSame('inativo', $professor->status);
    }

    public function testBeforeMarshalKeepsCanonicalStatus(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => 'aposentado']);
        $this->assertSame('aposentado', $professor->status);
    }

    public function testBeforeMarshalDropsEmptyStatus(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Teste', 'status' => '']);
        $this->assertNull($professor->status);
    }

    public function testSaveSetsTimestamps(): void
    {
        $professor = $this->Professores->newEntity(['nome' => 'Novo Professor']);
        $saved = $this->Professores->save($professor);

        $this->assertNotFalse($saved);
        $this->assertNotNull($saved->created);
        $this->assertNotNull($saved->modified);
    }

    public function testDeleteBlockedWhenEssextensoesExist(): void
    {
        $professor = $this->Professores->find()->where(['nome' => 'Maria da Silva'])->first();
        $this->assertNotNull($professor);
        $this->assertFalse($this->Professores->delete($professor));
        $this->assertNotNull($this->Professores->findById($professor->id)->first());
    }

    public function testDeleteAllowedWithoutDependents(): void
    {
        $professor = $this->Professores->find()->where(['nome' => 'Ana Lima'])->first();
        $this->assertNotNull($professor);
        $id = $professor->id;
        $this->assertTrue($this->Professores->delete($professor));
        $this->assertNull($this->Professores->findById($id)->first());
    }
}
