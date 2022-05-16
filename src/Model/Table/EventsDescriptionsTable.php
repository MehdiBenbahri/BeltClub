<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsDescriptions Model
 *
 * @method \App\Model\Entity\EventsDescription newEmptyEntity()
 * @method \App\Model\Entity\EventsDescription newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EventsDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsDescription findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EventsDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsDescription[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsDescription[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsDescription[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsDescription[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsDescription[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsDescriptionsTable extends Table
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

        $this->setTable('events_descriptions');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 45)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('img_path')
            ->maxLength('img_path', 200)
            ->requirePresence('img_path', 'create')
            ->notEmptyString('img_path');

        $validator
            ->notEmptyString('is_complete');

        $validator
            ->numeric('posX')
            ->allowEmptyString('posX');

        $validator
            ->numeric('posY')
            ->allowEmptyString('posY');

        return $validator;
    }
}
