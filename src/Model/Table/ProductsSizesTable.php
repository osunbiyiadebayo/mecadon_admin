<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsSizes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Sizes
 *
 * @method \App\Model\Entity\ProductsSize get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsSize newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsSize[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSize|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsSize patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSize[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSize findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsSizesTable extends Table
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

        $this->table('products_sizes');
        $this->displayField('product_id');
        $this->primaryKey(['product_id', 'size_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sizes', [
            'foreignKey' => 'size_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['size_id'], 'Sizes'));

        return $rules;
    }
}
