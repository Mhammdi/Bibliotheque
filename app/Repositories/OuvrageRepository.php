<?php

namespace App\Repositories;

use App\Models\Ouvrage;
use App\Repositories\BaseRepository;

/**
 * Class OuvrageRepository
 * @package App\Repositories
 * @version May 20, 2019, 12:55 pm UTC
*/

class OuvrageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titre',
        'editeur',
        'annee',
        'domaine',
        'stock',
        'site'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ouvrage::class;
    }
}
