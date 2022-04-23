<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsRights Model
 *
 * @method \App\Model\Entity\EventsRight newEmptyEntity()
 * @method \App\Model\Entity\EventsRight newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EventsRight[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsRight get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsRight findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EventsRight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsRight[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsRight|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsRight saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsRight[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsRight[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsRight[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsRight[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EventsRightsTable extends Table
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

        $this->setTable('events_rights');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('EventsRights')
            ->setForeignKey('id_event')
            ->setProperty('id');

        $this->hasMany('Users')
            ->setForeignKey('id_user')
            ->setProperty('id');
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
            ->integer('id_event')
            ->requirePresence('id_event', 'create')
            ->notEmptyString('id_event');

        $validator
            ->integer('id_user')
            ->allowEmptyString('id_user');

        $validator
            ->integer('id_role')
            ->allowEmptyString('id_role');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('level')
            ->notEmptyString('level');

        return $validator;
    }
}
