<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExtensoesFixture
 */
class ExtensoesFixture extends TestFixture
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
                'titulo' => 'Lorem ipsum dolor sit amet',
                'coordenacao' => 'Lorem ipsum dolor sit amet',
                'unidade' => 'Lorem ipsum dolor sit amet',
                'extensoes_id' => 1,
                'observacoes' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
