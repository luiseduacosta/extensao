<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfessoresFixture
 */
class ProfessoresFixture extends TestFixture
{
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => '123456789012345',
                'siape' => 1,
                'cress' => 'Lorem ipsu',
                'regiao' => 'RJ',
                'codigo_telefone' => 21,
                'telefone' => '123456789012345',
                'codigo_celular' => 21,
                'celular' => '123456789012345',
                'email' => 'lorem@ipsum.com',
                'curriculolattes' => 'Lorem ipsum dolor sit amet',
                'atualizacaolattes' => '2022-07-07',
                'dataingresso' => '2022-07-07',
                'departamento' => 'Lorem ipsum dolor sit amet',
                'dataegresso' => '2022-07-07',
                'motivoegresso' => 'Lorem ipsum dolor sit amet',
                'status' => 'ativo',
                'user_id' => 1,
                'estagiario_count' => 0,
                'observacoes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'estagiarios_count' => 0,
            ],
        ];
        parent::init();
    }
}
