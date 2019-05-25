<?php

namespace App\Repositories;

use App\Models\Ouvrage;
use App\Repositories\BaseRepository;

/**
 * Class OuvrageRepository
 * @package App\Repositories
 * @version May 22, 2019, 10:11 am UTC
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
        'site',
        'photo'
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
