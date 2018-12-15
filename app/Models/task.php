<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class task
 * @package App\Models
 * @version December 12, 2018, 9:23 pm UTC
 *
 * @property string subject
 * @property string body
 * @property integer pers_create
 * @property integer pers_assign
 * @property integer status_id
 * @property integer priority_id
 * @property integer repository_id
 * @property string fisier
 */
class task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'body',
        'pers_create',
        'pers_assign',
        'status_id',
        'priority_id',
        'repository_id',
        'fisier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subject' => 'string',
        'body' => 'string',
        'pers_create' => 'integer',
        'pers_assign' => 'integer',
        'status_id' => 'integer',
        'priority_id' => 'integer',
        'repository_id' => 'integer',
        'fisier' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subject' => 'required',
        'body' => 'required',
        'pers_create' => 'required',
        'pers_assign' => 'required'
    ];

    
}
