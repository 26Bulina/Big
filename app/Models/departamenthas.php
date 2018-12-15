<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class departament_has
 * @package App\Models
 * @version December 12, 2018, 9:40 pm UTC
 *
 * @property integer task_id
 * @property integer user_id
 * @property integer departament_id
 */
class departamenthas extends Model
{
    use SoftDeletes;

    public $table = 'departamenthas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'task_id',
        'user_id',
        'departament_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
        'user_id' => 'integer',
        'departament_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'departament_id' => 'required'
    ];

    
}
