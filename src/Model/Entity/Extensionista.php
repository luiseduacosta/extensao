<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Extensionista Entity
 *
 * @property int $id
 * @property int $estudante_id
 * @property int $extensao_id
 * @property string $cargahoraria
 * @property string $ano
 *
 * @property \App\Model\Entity\Estudante $estudante
 * @property \App\Model\Entity\Extensao $extensao
 */
class Extensionista extends Entity
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
    protected $_accessible = [
        'estudante_id' => true,
        'extensoes_id' => true,
        'essextensoes_id' => true,
        'cargahoraria' => true,
        'ano' => true,
        'estudantes' => true,
        'extensoes' => true,
        'essextensoes' => true,
    ];
}
