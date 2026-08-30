<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Docente Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $cpf
 * @property int|null $siape
 * @property int|null $cress
 * @property int|null $regiao
 * @property string $ddd_telefone
 * @property string|null $telefone
 * @property string $ddd_celular
 * @property string|null $celular
 * @property string|null $email
 * @property string|null $curriculolattes
 * @property \Cake\I18n\Date|null $atualizacaolattes
 * @property \Cake\I18n\Date|null $dataingresso
 * @property string|null $departamento
 * @property \Cake\I18n\Date|null $dataegresso
 * @property string|null $motivoegresso
 * @property string|null $observacoes
 * @property int|null $user_id
 * @property int|null $estagiarios_count
 * @property string|null $status
 *
 * @property \App\Model\Entity\Extensao[] $extensoes
 */
class Docente extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nome' => true,
        'cpf' => true,
        'siape' => true,
        'cress' => true,
        'regiao' => true,
        'ddd_telefone' => true,
        'telefone' => true,
        'ddd_celular' => true,
        'celular' => true,
        'email' => true,
        'curriculolattes' => true,
        'atualizacaolattes' => true,
        'dataingresso' => true,
        'departamento' => true,
        'dataegresso' => true,
        'motivoegresso' => true,
        'observacoes' => true,
        'user_id' => true,
        'estagiarios_count' => true,
        'status' => true,
        'essextensoes' => true,
    ];
}
