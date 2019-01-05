<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comment
 * @package App\Models
 * @version December 12, 2018, 9:37 pm UTC
 *
 * @property string body
 * @property integer user_id
 * @property integer task_id
 */
class comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'body',
        'user_id',
        'task_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'body' => 'string',
        'user_id' => 'integer',
        'task_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'body' => 'min:3',
        'task_id' => 'required'
    ];
public function task()
    {
        return $this->belongsTo('App\Models\task','task_id');
    }
    
}
