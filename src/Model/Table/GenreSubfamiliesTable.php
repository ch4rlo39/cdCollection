<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GenreSubfamilies Model
 *
 * @property \App\Model\Table\GenreFamiliesTable&\Cake\ORM\Association\BelongsTo $GenreFamilies
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\HasMany $Genres
 *
 * @method \App\Model\Entity\GenreSubfamily get($primaryKey, $options = [])
 * @method \App\Model\Entity\GenreSubfamily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GenreSubfamily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GenreSubfamily|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GenreSubfamily saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GenreSubfamily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GenreSubfamily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GenreSubfamily findOrCreate($search, callable $callback = null, $options = [])
 */
class GenreSubfamiliesTable extends Table
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

        $this->setTable('genre_subfamilies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('GenreFamilies', [
            'foreignKey' => 'genre_family_id',
        ]);
        $this->hasMany('Genres', [
            'foreignKey' => 'genre_subfamily_id',
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['genre_family_id'], 'GenreFamilies'));

        return $rules;
    }
}
