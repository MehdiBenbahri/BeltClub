<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsLots Model
 *
 * @method \App\Model\Entity\EventsLot newEmptyEntity()
 * @method \App\Model\Entity\EventsLot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EventsLot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsLot get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsLot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EventsLot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsLot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsLot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsLot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsLot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsLot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsLot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsLot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsLotsTable extends Table
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

        $this->setTable('events_lots');
        $this->setDisplayField('name');
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
            ->integer('id_events')
            ->requirePresence('id_events', 'create')
            ->notEmptyString('id_events');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('somme')
            ->allowEmptyString('somme');

        $validator
            ->notEmptyString('is_money');

        $validator
            ->notEmptyString('is_locked');

        $validator
            ->integer('price_depart')
            ->allowEmptyString('price_depart');

        $validator
            ->integer('price_min')
            ->allowEmptyString('price_min');

        return $validator;
    }
}
