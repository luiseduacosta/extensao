<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Situacaopr5 Entity
 *
 * @property int $id
 * @property string $situacao
 *
 * @property \App\Model\Entity\Extensao[] $extensao
 * @property \App\Model\Entity\Extensao[] $extensoes
 */
class Situacaopr5 extends Entity
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
        'situacao' => true,
        'essextensoes' => true,
    ];
}
