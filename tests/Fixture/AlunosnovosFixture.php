<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlunosnovosFixture
 */
class AlunosnovosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'registro' => 1,
                'codigo_telefone' => 1,
                'telefone' => 'Lorem i',
                'codigo_celular' => 1,
                'celular' => 'Lorem ip',
                'email' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsu',
                'identidade' => 'Lorem ipsum d',
                'orgao' => 'Lorem ip',
                'nascimento' => '2022-07-07',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem i',
                'municipio' => 'Lorem ipsum dolor sit amet',
                'bairro' => 'Lorem ipsum dolor sit amet',
                'observacoes' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
