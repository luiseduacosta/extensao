<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universidades Model
 *
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\HasMany $Extensoes
 *
 * @method \App\Model\Entity\Universidade newEmptyEntity()
 * @method \App\Model\Entity\Universidade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Universidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Universidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Universidade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Universidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Universidade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Universidade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Universidade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Universidade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Universidade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Universidade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Universidade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UniversidadesTable extends Table
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

        $this->setTable('universidades');
        $this->setDisplayField('universidade');
        $this->setPrimaryKey('id');

        $this->hasMany('Extensoes', [
            'foreignKey' => 'universidade_id',
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
            ->scalar('universidade')
            ->maxLength('universidade', 100)
            ->requirePresence('universidade', 'create')
            ->notEmptyString('universidade');

        $validator
            ->scalar('observacoes')
            ->maxLength('observacoes', 255)
            ->requirePresence('observacoes', 'create')
            ->allowEmptyString('observacoes');

        return $validator;
    }
}
