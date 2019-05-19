<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etudiant
 * @package App\Models
 * @version May 18, 2019, 2:07 pm UTC
 *
 * @property string name
 * @property string adresse
 * @property string universite
 * @property string cursus
 * @property integer nombre_emprunts
 */
class Etudiant extends Model
{
    use SoftDeletes;

    public $table = 'etudiants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'adresse',
        'universite',
        'cursus',
        'nombre_emprunts'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'adresse' => 'string',
        'universite' => 'string',
        'cursus' => 'string',
        'nombre_emprunts' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'adresse' => 'required',
        'cursus' => 'required'
    ];

    
}
