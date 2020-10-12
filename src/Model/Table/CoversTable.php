<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Covers Model
 *
 * @property \App\Model\Table\CdsTable&\Cake\ORM\Association\HasMany $Cds
 * @property \App\Model\Table\CdsTable&\Cake\ORM\Association\BelongsToMany $Cds
 *
 * @method \App\Model\Entity\Cover get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cover newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cover[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cover|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cover saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cover patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cover[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cover findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoversTable extends Table
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

        $this->setTable('covers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cds', [
            'foreignKey' => 'cover_id',
        ]);
        $this->belongsToMany('Cds', [
            'foreignKey' => 'cover_id',
            'targetForeignKey' => 'cd_id',
            'joinTable' => 'cds_covers',
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

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->requirePresence('path', 'create')
            ->notEmptyString('path');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        return $validator;
    }
}
