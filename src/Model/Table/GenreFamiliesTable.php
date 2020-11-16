<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GenreFamilies Model
 *
 * @property \App\Model\Table\GenreSubfamiliesTable&\Cake\ORM\Association\HasMany $GenreSubfamilies
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\HasMany $Genres
 *
 * @method \App\Model\Entity\GenreFamily get($primaryKey, $options = [])
 * @method \App\Model\Entity\GenreFamily newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GenreFamily[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GenreFamily|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GenreFamily saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GenreFamily patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GenreFamily[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GenreFamily findOrCreate($search, callable $callback = null, $options = [])
 */
class GenreFamiliesTable extends Table
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

        $this->setTable('genre_families');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('GenreSubfamilies', [
            'foreignKey' => 'genre_family_id',
        ]);
        $this->hasMany('Genres', [
            'foreignKey' => 'genre_family_id',
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
