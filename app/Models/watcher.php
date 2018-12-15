<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class watcher
 * @package App\Models
 * @version December 12, 2018, 9:32 pm UTC
 *
 * @property integer task_id
 * @property integer user_id
 * @property integer watched
 */
class watcher extends Model
{
    use SoftDeletes;

    public $table = 'watchers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'task_id',
        'user_id',
        'watched'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
        'user_id' => 'integer',
        'watched' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'watched' => 'required'
    ];

    
}
