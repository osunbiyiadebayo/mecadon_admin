<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dashboards Model
 *
 * @method \App\Model\Entity\Dashboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dashboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dashboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dashboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard findOrCreate($search, callable $callback = null, $options = [])
 */
class DashboardsTable extends Table
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

        $this->table('dashboards');
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
