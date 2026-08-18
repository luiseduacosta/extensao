<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * Situacaopr5Fixture
 */
class Situacaopr5Fixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'situacaopr5';
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
                'situacao' => 'Lorem ipsum dolor sit a',
            ],
        ];
        parent::init();
    }
}
