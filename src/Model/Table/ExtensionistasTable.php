<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Extensionistas Model
 *
 * @property \App\Model\Table\EstudantesTable&\Cake\ORM\Association\BelongsTo $Estudantes
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\BelongsTo $Extensoes
 *
 * @method \App\Model\Entity\Extensionista newEmptyEntity()
 * @method \App\Model\Entity\Extensionista newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Extensionista[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Extensionista get($primaryKey, $options = [])
 * @method \App\Model\Entity\Extensionista findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Extensionista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Extensionista[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Extensionista|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Extensionista saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Extensionista[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensionista[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensionista[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Extensionista[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExtensionistasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('extensionistas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Estudantes', [
            'foreignKey' => 'estudante_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Extensoes', [
            'foreignKey' => 'extensoes_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Essextensoes', [
            'foreignKey' => 'essextensoes_id',
            'joinType' => 'INNER',
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
                ->integer('estudante_id')
                ->requirePresence('estudante_id', 'create')
                ->notEmptyString('estudante_id');

        $validator
                ->integer('extensoes_id')
                ->requirePresence('extensoes_id', 'create')
                ->notEmptyString('extensoes_id');

        $validator
                ->integer('essextensoes_id')
                ->allowEmptyString('essextensoes_id', 'Sem extensão na ESS', true);

        $validator
                ->scalar('cargahoraria')
                ->maxLength('cargahoraria', 3)
                ->requirePresence('cargahoraria', 'create')
                ->notEmptyString('cargahoraria');

        $validator
                ->scalar('ano')
                ->maxLength('ano', 4)
                ->requirePresence('ano', 'create')
                ->notEmptyString('ano');

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
        $rules->add($rules->existsIn('estudante_id', 'Estudantes'), ['errorField' => 'estudante_id']);
        $rules->add($rules->existsIn('extensao_id', 'Extensoes'), ['errorField' => 'extensao_id']);

        return $rules;
    }

}
