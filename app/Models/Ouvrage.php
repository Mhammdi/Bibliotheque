<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ouvrage
 * @package App\Models
 * @version May 22, 2019, 10:11 am UTC
 *
 * @property string titre
 * @property string editeur
 * @property string annee
 * @property string domaine
 * @property integer stock
 * @property string site
 * @property string photo
 * @property string description
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
        'site',
        'photo',
        'description'
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
        'site' => 'string',
        'photo' => 'string',
        'description' => 'string'
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
        'site' => 'required',
        'description' => 'required'
        
    ];

    
}
