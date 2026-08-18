<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Situacaopr5 Model
 *
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\HasMany $Extensoes
 *
 * @method \App\Model\Entity\Situacaopr5 newEmptyEntity()
 * @method \App\Model\Entity\Situacaopr5 newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Situacaopr5[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Situacaopr5 get($primaryKey, $options = [])
 * @method \App\Model\Entity\Situacaopr5 findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Situacaopr5 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Situacaopr5[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Situacaopr5|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Situacaopr5 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Situacaopr5[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Situacaopr5[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Situacaopr5[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Situacaopr5[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class Situacaopr5Table extends Table
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

        $this->setTable('situacaopr5');
        $this->setDisplayField('situacao');
        $this->setPrimaryKey('id');

        $this->hasMany('Essextensoes', [
            'foreignKey' => 'situacaopr5_id',
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
            ->scalar('situacao')
            ->maxLength('situacao', 25)
            ->requirePresence('situacao', 'create')
            ->notEmptyString('situacao');

        return $validator;
    }
}
