<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocentesFixture
 */
class DocentesFixture extends TestFixture
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
                'cpf' => '',
                'siape' => 1,
                'datanascimento' => '2022-07-07',
                'localnascimento' => 'Lorem ipsum dolor sit amet',
                'sexo' => 'Lorem ipsum dolor sit amet',
                'ddd_telefone' => '',
                'telefone' => 'Lorem ipsu',
                'ddd_celular' => '',
                'celular' => 'Lorem ipsu',
                'email' => 'Lorem ipsum dolor sit amet',
                'homepage' => 'Lorem ipsum dolor sit amet',
                'redesocial' => 'Lorem ipsum dolor sit amet',
                'curriculolattes' => 'Lorem ipsum dolor sit amet',
                'atualizacaolattes' => '2022-07-07',
                'curriculosigma' => 'Lorem',
                'pesquisadordgp' => 'Lorem ipsum dolor ',
                'formacaoprofissional' => 'Lorem ipsum dolor sit amet',
                'universidadedegraduacao' => 'Lorem ipsum dolor sit amet',
                'anoformacao' => 1,
                'mestradoarea' => 'Lorem ipsum dolor sit amet',
                'mestradouniversidade' => 'Lorem ipsum dolor sit amet',
                'mestradoanoconclusao' => 1,
                'doutoradoarea' => 'Lorem ipsum dolor sit amet',
                'doutoradouniversidade' => 'Lorem ipsum dolor sit amet',
                'doutoradoanoconclusao' => 1,
                'dataingresso' => '2022-07-07',
                'formaingresso' => 'Lorem ipsum dolor sit amet',
                'tipocargo' => 'Lorem ip',
                'categoria' => 'Lorem ip',
                'regimetrabalho' => 'Lor',
                'departamento' => 'Lorem ipsum dolor sit amet',
                'dataegresso' => '2022-07-07',
                'motivoegresso' => 'Lorem ipsum dolor sit amet',
                'observacoes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
