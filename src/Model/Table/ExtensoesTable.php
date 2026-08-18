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
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\BelongsTo $Extensoes
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
class ExtensoesTable extends Table
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

        $this->setTable('extensoes');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Essextensoes', [
            'foreignKey' => 'essextensoes_id'
        ]);

        $this->belongsTo('Universidades', [
            'foreignKey' => 'universidade_id'
        ]);
        
        $this->hasMany('Extensionistas', [
            'foreignKey' => 'extensoes_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 150)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('coordenacao')
            ->maxLength('coordenacao', 50)
            ->allowEmptyString('coordenacao');

        $validator
            ->integer('universidade_id')
            ->allowEmptyString('universidade_id');
                
        $validator
            ->scalar('unidade')
            ->maxLength('unidade', 50)
            ->allowEmptyString('unidade');

        $validator
            ->integer('essextensoes_id')
            ->allowEmptyString('essextensoes_id');

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
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('essextensoes_id', 'Essextensoes'), ['errorField' => 'essextensoes_id']);

        return $rules;
    }
}
