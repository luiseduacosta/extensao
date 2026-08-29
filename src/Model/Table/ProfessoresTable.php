<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professores Model
 *
 * @property \App\Model\Table\EssextensoesTable&\Cake\ORM\Association\HasMany $Essextensoes
 *
 * @method \App\Model\Entity\Professor newEmptyEntity()
 * @method \App\Model\Entity\Professor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Professor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Professor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProfessoresTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('professores');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Essextensoes', [
            'foreignKey' => 'docente_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 50)
            ->notEmptyString('nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 15)
            ->allowEmptyString('cpf');

        $validator
            ->integer('siape')
            ->allowEmptyString('siape');

        $validator
            ->scalar('cress')
            ->maxLength('cress', 10)
            ->allowEmptyString('cress');

        $validator
            ->scalar('regiao')
            ->maxLength('regiao', 2)
            ->allowEmptyString('regiao');

        $validator
            ->integer('codigo_telefone')
            ->allowEmptyString('codigo_telefone');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->allowEmptyString('telefone');

        $validator
            ->integer('codigo_celular')
            ->allowEmptyString('codigo_celular');

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
            ->scalar('status')
            ->maxLength('status', 10)
            ->notEmptyString('status');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('estagiario_count')
            ->allowEmptyString('estagiario_count');

        $validator
            ->scalar('observacoes')
            ->allowEmptyString('observacoes');

        $validator
            ->integer('estagiarios_count')
            ->allowEmptyString('estagiarios_count');

        return $validator;
    }
}
