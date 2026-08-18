<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Informacoes Model
 *
 * @method \App\Model\Entity\Informacao newEmptyEntity()
 * @method \App\Model\Entity\Informacao newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Informacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Informacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Informacao findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Informacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Informacao[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Informacao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Informacao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Informacao[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Informacao[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Informacao[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Informacao[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InformacoesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('informacoes');
        $this->setDisplayField('cabecalho');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->scalar('cabecalho')
                ->maxLength('cabecalho', 255)
                ->requirePresence('cabecalho', 'create')
                ->notEmptyString('cabecalho');

        $validator
                ->scalar('corpo')
                ->requirePresence('corpo', 'create')
                ->notEmptyString('corpo');

        $validator
                ->date('data')
                ->requirePresence('data', 'create')
                ->allowEmptyDate('data');

        return $validator;
    }

}
