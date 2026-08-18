<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taes Model
 *
 * @property \App\Model\Table\EssextensoesTable&\Cake\ORM\Association\HasMany $Essextensoes
 * @property \App\Model\Table\ExtensoesTable&\Cake\ORM\Association\HasMany $Extensoes
 *
 * @method \App\Model\Entity\Tae newEmptyEntity()
 * @method \App\Model\Entity\Tae newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tae[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tae get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tae findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tae patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tae[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tae|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tae saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tae[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tae[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tae[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tae[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TaesTable extends Table
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

        $this->setTable('taes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Essextensoes', [
            'foreignKey' => 'tae_id',
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
            ->integer('siape')
            ->requirePresence('siape', 'create')
            ->notEmptyString('siape');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 50)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        return $validator;
    }
}
