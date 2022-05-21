<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesAnnonces Model
 *
 * @method \App\Model\Entity\TypesAnnonce newEmptyEntity()
 * @method \App\Model\Entity\TypesAnnonce newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TypesAnnonce[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesAnnonce get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesAnnonce findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TypesAnnonce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAnnonce[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAnnonce|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesAnnonce saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesAnnonce[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TypesAnnonce[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TypesAnnonce[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TypesAnnonce[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesAnnoncesTable extends Table
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

        $this->setTable('types_annonces');
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
            ->scalar('nom')
            ->maxLength('nom', 45)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 45)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->notEmptyString('is_legal');

        return $validator;
    }
}
