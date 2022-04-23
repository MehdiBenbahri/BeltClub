<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contributors Model
 *
 * @method \App\Model\Entity\Contributor newEmptyEntity()
 * @method \App\Model\Entity\Contributor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contributor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contributor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contributor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contributor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contributor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contributor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contributor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contributor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contributor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contributor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contributor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContributorsTable extends Table
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

        $this->setTable('contributors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id_users')
            ->requirePresence('id_users', 'create')
            ->notEmptyString('id_users');

        $validator
            ->integer('id_events')
            ->requirePresence('id_events', 'create')
            ->notEmptyString('id_events');

        $validator
            ->integer('somme_reverse')
            ->allowEmptyString('somme_reverse');

        $validator
            ->integer('somme_du')
            ->allowEmptyString('somme_du');

        $validator
            ->numeric('pourcentage')
            ->allowEmptyString('pourcentage');

        return $validator;
    }
}
