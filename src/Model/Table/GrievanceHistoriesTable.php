<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrievanceHistories Model
 *
 * @method \App\Model\Entity\GrievanceHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrievanceHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrievanceHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrievanceHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class GrievanceHistoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('grievance_histories');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
