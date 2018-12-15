<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class departament
 * @package App\Models
 * @version December 12, 2018, 9:11 pm UTC
 *
 * @property string name
 * @property string description
 */
class departament extends Model
{
    use SoftDeletes;

    public $table = 'departaments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'min:2'
    ];

    
}
