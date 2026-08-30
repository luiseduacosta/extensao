<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateEssextensoes extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('essextensoes');
        $table
            ->addColumn('titulo', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('docente_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('tae_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('segmento', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('segmento_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('datacongregacao', 'date', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('situacaopr5_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('versao', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('observacoes', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();
    }
}
