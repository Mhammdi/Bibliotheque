<?php

namespace App\Repositories;

use App\Models\Etudiant;
use App\Repositories\BaseRepository;

/**
 * Class EtudiantRepository
 * @package App\Repositories
 * @version May 18, 2019, 2:07 pm UTC
*/

class EtudiantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'adresse',
        'universite',
        'cursus',
        'nombre_emprunts'
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
        return Etudiant::class;
    }
}
