<?php

namespace App\Repositories;

use App\Models\Auteur;
use App\Repositories\BaseRepository;

/**
 * Class AuteurRepository
 * @package App\Repositories
 * @version May 18, 2019, 4:17 pm UTC
*/

class AuteurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Auteur::class;
    }
}
