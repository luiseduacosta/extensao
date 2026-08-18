<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Extensao Entity
 *
 * @property int $id
 * @property string $titulo
 * @property int|null $docente_id
 * @property int|null $tae_id
 * @property int $segmento_id
 * @property string|null $nome
 * @property \Cake\I18n\Date|null $datacongregacao
 * @property int|null $situacaopr5_id
 * @property int|null $versao
 * @property string $tipo
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\Segmento $segmento
 * @property \App\Model\Entity\Docente $docente
 * @property \App\Model\Entity\Tae $tae
 * @property \App\Model\Entity\Situacaopr5 $situacaopr5
 * @property \App\Model\Entity\Extensionista[] $extensionistas
 */
class Essextensao extends Entity
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
        'docente_id' => true,
        'tae_id' => true,
        'segmento' => true,
        'segmento_id' => true,
        'nome' => true,
        'datacongregacao' => true,
        'situacaopr5_id' => true,
        'versao' => true,
        'tipo' => true,
        'observacoes' => true,
        'docente' => true,
        'tae' => true,
        'situacaopr5' => true,
        'extensionistas' => true,
    ];
}
