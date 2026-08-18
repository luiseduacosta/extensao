<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tae Entity
 *
 * @property int $id
 * @property int $siape
 * @property string $nome
 *
 * @property \App\Model\Entity\ExtensaoOld[] $extensao_old
 * @property \App\Model\Entity\Extensao[] $extensoes
 */
class Tae extends Entity
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
        'siape' => true,
        'nome' => true,
        'essextensoes' => true,
    ];
}
