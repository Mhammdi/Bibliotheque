<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ouvrage
 * @package App\Models
 * @version May 20, 2019, 12:55 pm UTC
 *
 * @property string titre
 * @property string editeur
 * @property string annee
 * @property string domaine
 * @property integer stock
 * @property string site
 */
class Ouvrage extends Model
{
    use SoftDeletes;

    public $table = 'ouvrages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titre',
        'editeur',
        'annee',
        'domaine',
        'stock',
        'site'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'editeur' => 'string',
        'annee' => 'string',
        'domaine' => 'string',
        'stock' => 'integer',
        'site' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required',
        'editeur' => 'required',
        'annee' => 'required',
        'domaine' => 'required',
        'stock' => 'required',
        'site' => 'required'
    ];

    
}
