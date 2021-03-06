<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsColors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Colors
 *
 * @method \App\Model\Entity\ProductsColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsColor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsColor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsColor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsColor findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsColorsTable extends Table
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

        $this->table('products_colors');
        $this->displayField('product_id');
        $this->primaryKey(['product_id', 'color_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Colors', [
            'foreignKey' => 'color_id',
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
        $rules->add($rules->existsIn(['color_id'], 'Colors'));

        return $rules;
    }
}
