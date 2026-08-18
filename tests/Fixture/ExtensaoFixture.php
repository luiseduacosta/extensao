<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExtensaoFixture
 */
class ExtensaoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'extensao';
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
                'titulo' => 'Lorem ipsum dolor sit amet',
                'docente_id' => 1,
                'tae_id' => 1,
                'segmento' => 'Lorem ip',
                'segmento_id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'datacongregacao' => '2022-07-07',
                'situacaopr5_id' => 1,
                'versao' => 1,
                'observacoes' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
