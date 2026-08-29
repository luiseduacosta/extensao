<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Extensoes Model
 *
 * @property \App\Model\Table\ProfessoresTable&\Cake\ORM\Association\BelongsTo $Professores
 * @property \App\Model\Table\TaesTable&\Cake\ORM\Association\BelongsTo $Taes
// Removed invalid property reference to SegmentosTable as it was causing an unknown class error
 * @property \App\Model\Table\Situacaopr5Table&\Cake\ORM\Association\BelongsTo $Situacaopr5
 * @property \App\Model\Table\ExtensionistasTable&\Cake\ORM\Association\HasMany $Extensionistas
 *
 * @method \App\Model\Entity\Extensao newEmptyEntity()
 * @method \App\Model\Entity\Extensao newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Extensao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Extensao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Extensao findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Extensao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Extensao[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Extensao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Extensao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EssextensoesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('essextensoes');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Professores', [
            'foreignKey' => 'docente_id',
        ]);
        $this->belongsTo('Taes', [
            'foreignKey' => 'tae_id',
        ]);
        $this->belongsTo('Situacaopr5', [
            'foreignKey' => 'situacaopr5_id',
        ]);
        $this->hasMany('Extensionistas', [
            'foreignKey' => 'extensoes_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->scalar('titulo')
                ->maxLength('titulo', 150)
                ->requirePresence('titulo', 'create')
                ->notEmptyString('titulo');

        $validator
                ->integer('docente_id')
                ->allowEmptyString('docente_id');

        $validator
                ->integer('tae_id')
                ->allowEmptyString('tae_id');

        $validator
                ->scalar('segmento')
                ->maxLength('segmento', 10)
                ->requirePresence('segmento', 'create')
                ->allowEmptyString('segmento');

        $validator
                ->integer('segmento_id')
                ->requirePresence('segmento_id', 'create')
                ->allowEmptyString('segmento_id');

        $validator
                ->scalar('nome')
                ->maxLength('nome', 50)
                ->allowEmptyString('nome');

        $validator
                ->date('datacongregacao')
                ->allowEmptyDate('datacongregacao');

        $validator
                ->integer('situacaopr5_id')
                ->allowEmptyString('situacaopr5_id');

        $validator
                ->allowEmptyString('versao');

        $validator
                ->scalar('tipo')
                ->maxLength('tipo', 20)
                ->allowEmptyString('tipo');

        $validator
                ->scalar('observacoes')
                ->maxLength('observacoes', 255)
                ->allowEmptyString('observacoes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->existsIn('docente_id', 'Professores'), ['errorField' => 'docente_id']);
        $rules->add($rules->existsIn('tae_id', 'Taes'), ['errorField' => 'tae_id']);
        // $rules->add($rules->existsIn('segmento_id', 'Segmentos'), ['errorField' => 'segmento_id']);
        $rules->add($rules->existsIn('situacaopr5_id', 'Situacaopr5'), ['errorField' => 'situacaopr5_id']);

        return $rules;
    }

}
