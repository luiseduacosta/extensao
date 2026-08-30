<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Docentes Model
 *
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\HasMany $Extensoes
 * @property \App\Model\Table\EssextensoesTable&\Cake\ORM\Association\HasMany $Essextensoes
 */
class DocentesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('docentes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Essextensoes', [
            'foreignKey' => 'docente_id',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 50)
            ->notEmptyString('nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->allowEmptyString('cpf');

        $validator
            ->integer('siape')
            ->allowEmptyString('siape');

        $validator
            ->nonNegativeInteger('cress')
            ->allowEmptyString('cress');

        $validator
            ->nonNegativeInteger('regiao')
            ->allowEmptyString('regiao');

        $validator
            ->scalar('ddd_telefone')
            ->maxLength('ddd_telefone', 2)
            ->allowEmptyString('ddd_telefone');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('ddd_celular')
            ->maxLength('ddd_celular', 2)
            ->allowEmptyString('ddd_celular');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 15)
            ->allowEmptyString('celular');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('curriculolattes')
            ->maxLength('curriculolattes', 50)
            ->allowEmptyString('curriculolattes');

        $validator
            ->date('atualizacaolattes')
            ->allowEmptyDate('atualizacaolattes');

        $validator
            ->date('dataingresso')
            ->allowEmptyDate('dataingresso');

        $validator
            ->scalar('departamento')
            ->maxLength('departamento', 30)
            ->allowEmptyString('departamento');

        $validator
            ->date('dataegresso')
            ->allowEmptyDate('dataegresso');

        $validator
            ->scalar('motivoegresso')
            ->maxLength('motivoegresso', 100)
            ->allowEmptyString('motivoegresso');

        $validator
            ->scalar('observacoes')
            ->allowEmptyString('observacoes');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('estagiarios_count')
            ->allowEmptyString('estagiarios_count');

        $validator
            ->scalar('status')
            ->maxLength('status', 10)
            ->allowEmptyString('status');

        return $validator;
    }
}
