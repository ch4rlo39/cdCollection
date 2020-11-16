<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GenreSubfamily Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $genre_family_id
 *
 * @property \App\Model\Entity\GenreFamily $genre_family
 * @property \App\Model\Entity\Genre[] $genres
 */
class GenreSubfamily extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'genre_family_id' => true,
        'genre_family' => true,
        'genres' => true,
    ];
}
