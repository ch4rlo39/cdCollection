<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GenreFamily Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\GenreSubfamily[] $genre_subfamilies
 * @property \App\Model\Entity\Genre[] $genres
 */
class GenreFamily extends Entity
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
        'genre_subfamilies' => true,
        'genres' => true,
    ];
}
