<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProfessoresController Test Case
 *
 * @uses \App\Controller\ProfessoresController
 */
class ProfessoresControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'app.Professores',
        'app.Essextensoes',
    ];

    protected function loginAs(int $categoria = 1): void
    {
        $this->session([
            'Auth' => [
                'id' => 1,
                'email' => 'admin@example.com',
                'categoria' => $categoria,
            ],
        ]);
    }

    public function testIndexAuthenticated(): void
    {
        $this->loginAs(1);
        $this->get('/professores');
        $this->assertResponseOk();
        $this->assertResponseContains('Maria da Silva');
        $this->assertResponseContains('João Souza');
    }

    public function testIndexStatusFilter(): void
    {
        $this->loginAs(1);
        $this->get('/professores?status=ativo');
        $this->assertResponseOk();
        $this->assertResponseContains('Maria da Silva');
        $this->assertResponseNotContains('João Souza');
    }

    public function testIndexStatusFilterAcceptsAlias(): void
    {
        $this->loginAs(1);
        $this->get('/professores?status=retired');
        $this->assertResponseOk();
        $this->assertResponseContains('João Souza');
        $this->assertResponseNotContains('Maria da Silva');
    }

    public function testView(): void
    {
        $this->loginAs(1);
        $professoresTable = TableRegistry::getTableLocator()->get('Professores');
        $professor = $professoresTable->find()->where(['nome' => 'Maria da Silva'])->first();
        $this->assertNotNull($professor);

        $this->get('/professores/view/' . $professor->id);
        $this->assertResponseOk();
        $this->assertResponseContains('Maria da Silva');
        $this->assertResponseContains('1234567890123456');
    }

    public function testAdd(): void
    {
        $this->loginAs(1);
        $this->enableCsrfToken();
        $this->post('/professores/add', [
            'nome' => 'Novo Professor Teste',
            'email' => 'novo@example.com',
            'curriculolattes' => '9876543210987654',
            'atualizacaolattes' => '2026-02-10',
            'status' => 'ativo',
        ]);
        $this->assertRedirectContains('/professores/view');

        $professores = TableRegistry::getTableLocator()->get('Professores');
        $query = $professores->find()->where(['nome' => 'Novo Professor Teste']);
        $this->assertSame(1, $query->count());
        $docente = $query->first();
        $this->assertSame('ativo', $docente->status);
    }

    public function testAddKeepsAtivoWhenStatusEmpty(): void
    {
        $this->loginAs(1);
        $this->enableCsrfToken();
        $this->post('/professores/add', [
            'nome' => 'Professor Sem Status',
            'status' => '',
        ]);
        $this->assertRedirectContains('/professores/view');

        $professores = TableRegistry::getTableLocator()->get('Professores');
        $docente = $professores->find()->where(['nome' => 'Professor Sem Status'])->first();
        $this->assertNotNull($docente);
        $this->assertSame('ativo', $docente->status);
    }

    public function testEdit(): void
    {
        $this->loginAs(1);
        $this->enableCsrfToken();
        $professoresTable = TableRegistry::getTableLocator()->get('Professores');
        $professor = $professoresTable->find()->where(['nome' => 'Ana Lima'])->first();
        $this->assertNotNull($professor);

        $this->post('/professores/edit/' . $professor->id, [
            'nome' => 'Ana Lima Alterada',
            'status' => 'aposentado',
        ]);
        $this->assertRedirectContains('/professores/view/' . $professor->id);

        $docente = $professoresTable->get($professor->id);
        $this->assertSame('Ana Lima Alterada', $docente->nome);
        $this->assertSame('aposentado', $docente->status);
    }

    public function testDeleteBlockedWhenEssextensoesExist(): void
    {
        $this->loginAs(1);
        $this->enableCsrfToken();
        $professoresTable = TableRegistry::getTableLocator()->get('Professores');
        $professor = $professoresTable->find()->where(['nome' => 'Maria da Silva'])->first();
        $this->assertNotNull($professor);
        $id = $professor->id;

        $this->post('/professores/delete/' . $id);
        $this->assertRedirectContains('/professores');

        $this->assertNotNull($professoresTable->findById($id)->first());
    }

    public function testDelete(): void
    {
        $this->loginAs(1);
        $this->enableCsrfToken();
        $professoresTable = TableRegistry::getTableLocator()->get('Professores');
        $professor = $professoresTable->find()->where(['nome' => 'Ana Lima'])->first();
        $this->assertNotNull($professor);
        $id = $professor->id;

        $this->post('/professores/delete/' . $id);
        $this->assertRedirectContains('/professores');

        $this->assertNull($professoresTable->findById($id)->first());
    }
}
