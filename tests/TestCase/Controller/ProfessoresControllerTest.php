<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ProfessoresController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProfessoresController Test Case
 *
 * @uses \App\Controller\ProfessoresController
 */
class ProfessoresControllerTest extends TestCase
{
    use IntegrationTestTrait;

    protected array $fixtures = [
        'app.Professores',
        'app.Essextensoes',
    ];

    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
