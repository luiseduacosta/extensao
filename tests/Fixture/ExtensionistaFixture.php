<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExtensionistaFixture
 */
class ExtensionistaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'extensionista';
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
                'alunonovos_id' => 1,
                'extensao_id' => 1,
                'cargahoraria' => '',
                'ano' => '',
            ],
        ];
        parent::init();
    }
}
