<?php

namespace App\Repositories;

use App\Models\Employe;
use App\Repositories\BaseRepository;

/**
 * Class EmployeRepository
 * @package App\Repositories
 * @version May 18, 2019, 4:11 pm UTC
*/

class EmployeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'adresse',
        'statut',
        'affectation'
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
        return Employe::class;
    }
}
