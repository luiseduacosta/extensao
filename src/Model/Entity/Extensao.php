<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Extensao Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $coordenacao
 * @property string|null $unidade
 * @property int|null $extensoes_id
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\Extensao $extensao
 * @property \App\Model\Entity\Extensionista[] $extensionistas
 */
class Extensao extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'titulo' => true,
        'coordenacao' => true,
        'universidade_id' => true,
        'unidade' => true,
        'essextensoes_id' => true,
        'observacoes' => true,
        'universidades' => true,
        'essextensoes' => true,
        'extensionistas' => true,
    ];
}
