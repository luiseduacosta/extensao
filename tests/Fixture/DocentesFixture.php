<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocentesFixture
 */
class DocentesFixture extends TestFixture
{
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null],
        'nome' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'precision' => null],
        'cpf' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'precision' => null],
        'siape' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null],
        'cress' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null],
        'regiao' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null],
        'ddd_telefone' => ['type' => 'string', 'length' => 2, 'null' => false, 'default' => '21', 'precision' => null],
        'telefone' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'precision' => null],
        'ddd_celular' => ['type' => 'string', 'length' => 2, 'null' => false, 'default' => '21', 'precision' => null],
        'celular' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'precision' => null],
        'curriculolattes' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'precision' => null],
        'atualizacaolattes' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null],
        'dataingresso' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null],
        'departamento' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'precision' => null],
        'dataegresso' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null],
        'motivoegresso' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'precision' => null],
        'observacoes' => ['type' => 'text', 'null' => true, 'default' => null, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null],
        'estagiarios_count' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => 0, 'precision' => null],
        'status' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => 'ativo', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];

    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Docente Teste',
                'cpf' => '12345678901',
                'siape' => 1234567,
                'ddd_telefone' => '21',
                'telefone' => '22223333',
                'ddd_celular' => '21',
                'celular' => '999998888',
                'email' => 'docente@test.com',
                'curriculolattes' => 'http://lattes.cnpq.br/123',
                'departamento' => 'DCC',
                'status' => 'ativo',
                'estagiarios_count' => 0,
            ],
        ];
        parent::init();
    }
}
