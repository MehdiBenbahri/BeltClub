<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Annonces Model
 *
 * @method \App\Model\Entity\Annonce newEmptyEntity()
 * @method \App\Model\Entity\Annonce newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Annonce[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Annonce get($primaryKey, $options = [])
 * @method \App\Model\Entity\Annonce findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Annonce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Annonce[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Annonce|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Annonce saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Annonce[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Annonce[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Annonce[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Annonce[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AnnoncesTable extends Table
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

        $this->belongsTo('Users')
            ->setForeignKey('id_user')
            ->setProperty('user');

        $this->belongsTo('TypesAnnonces')
            ->setForeignKey('id_type_annonce')
            ->setProperty('type');

        $this->setTable('annonces');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmptyString('id_user');

        $validator
            ->integer('id_type_annonce')
            ->requirePresence('id_type_annonce', 'create')
            ->notEmptyString('id_type_annonce');

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
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->notEmptyString('is_negociable');

        $validator
            ->notEmptyString('is_legal');

        $validator
            ->notEmptyString('is_complete');

        $validator
            ->scalar('posX')
            ->maxLength('posX', 45)
            ->requirePresence('posX', 'create')
            ->notEmptyString('posX');

        $validator
            ->scalar('posY')
            ->maxLength('posY', 45)
            ->requirePresence('posY', 'create')
            ->notEmptyString('posY');

        return $validator;
    }
}
