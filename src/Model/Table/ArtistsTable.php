<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artists Model
 *
 * @property \App\Model\Table\CdsTable&\Cake\ORM\Association\HasMany $Cds
 *
 * @method \App\Model\Entity\Artist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artist findOrCreate($search, callable $callback = null, $options = [])
 */
class ArtistsTable extends Table
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

        $this->setTable('artists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Cds', [
            'foreignKey' => 'artist_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
