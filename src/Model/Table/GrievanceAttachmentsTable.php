<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrievanceAttachments Model
 *
 * @method \App\Model\Entity\GrievanceAttachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrievanceAttachment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrievanceAttachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceAttachment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrievanceAttachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceAttachment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrievanceAttachment findOrCreate($search, callable $callback = null, $options = [])
 */
class GrievanceAttachmentsTable extends Table
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

        $this->table('grievance_attachments');
        $this->displayField('name');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
