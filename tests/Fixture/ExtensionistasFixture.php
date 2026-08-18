<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExtensionistasFixture
 */
class ExtensionistasFixture extends TestFixture
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
                'alunosnovos_id' => 1,
                'extensao_id' => 1,
                'cargahoraria' => '',
                'ano' => '',
            ],
        ];
        parent::init();
    }
}
