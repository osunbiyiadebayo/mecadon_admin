<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MainCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $SubCategories
 *
 * @method \App\Model\Entity\MainCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\MainCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MainCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MainCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MainCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MainCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MainCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MainCategoriesTable extends Table
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

        $this->table('main_categories');
        $this->displayField('categoryname');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SubCategories', [
            'foreignKey' => 'main_category_id'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'category_logo' => [
                 // This can also be in a class that implements
                // the TransformerInterface or any callable type.
                'transformer' => function (\Cake\Datasource\RepositoryInterface $table, \Cake\Datasource\EntityInterface $entity, $data, $field, $settings) {
                    // get the extension from the file
                    // there could be better ways to do this, and it will fail
                    // if the file has no extension
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(500, 100);
                    
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();
                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                            ->thumbnail($size, $mode)
                            ->save($tmp);
                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
            ],
        ]);


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
            ->requirePresence('categoryname', 'create')
            ->notEmpty('categoryname');

        $validator
            ->allowEmpty('category_logo');

        return $validator;
    }
}
