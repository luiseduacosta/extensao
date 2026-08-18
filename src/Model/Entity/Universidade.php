<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Universidade Entity
 *
 * @property int $id
 * @property string $universidade
 * @property string $observacoes
 *
 * @property \App\Model\Entity\Extensao[] $extensoes
 */
class Universidade extends Entity
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
        'universidade' => true,
        'observacoes' => true,
        'extensoes' => true,
    ];
}
