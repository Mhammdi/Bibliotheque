<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employe
 * @package App\Models
 * @version May 18, 2019, 4:11 pm UTC
 *
 * @property string name
 * @property string adresse
 * @property string statut
 * @property string affectation
 */
class Employe extends Model
{
    use SoftDeletes;

    public $table = 'employes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'adresse',
        'statut',
        'affectation'
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
        'statut' => 'string',
        'affectation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'adresse' => 'required'
    ];

    
}
