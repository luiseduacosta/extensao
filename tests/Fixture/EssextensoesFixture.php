<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EssextensoesFixture
 */
class EssextensoesFixture extends TestFixture
{
    public string $table = 'essextensoes';

    public array $fields = [
        'id' => ['type' => 'integer', 'autoIncrement' => true],
        'titulo' => ['type' => 'string', 'length' => 150, 'null' => false],
        'docente_id' => ['type' => 'integer', 'null' => true],
        'tae_id' => ['type' => 'integer', 'null' => true],
        'segmento' => ['type' => 'string', 'length' => 10, 'null' => true],
        'segmento_id' => ['type' => 'integer', 'null' => true],
        'nome' => ['type' => 'string', 'length' => 50, 'null' => true],
        'datacongregacao' => ['type' => 'date', 'null' => true],
        'situacaopr5_id' => ['type' => 'integer', 'null' => true],
        'versao' => ['type' => 'string', 'length' => 10, 'null' => true],
        'tipo' => ['type' => 'string', 'length' => 20, 'null' => true],
        'observacoes' => ['type' => 'string', 'length' => 255, 'null' => true],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    public array $records = [
        [
            'id' => 1,
            'titulo' => 'Atividade de Teste 1',
            'docente_id' => 1,
            'segmento' => 'extensao',
            'segmento_id' => 1,
            'nome' => 'Projeto Extensão',
        ],
    ];
}
