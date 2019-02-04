<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Remember
 * @package App\Models
 * @version December 10, 2018, 8:30 pm UTC
 *
 * @property integer user_id
 * @property date date
 * @property string message
 */
class Remember extends Model
{
    use SoftDeletes;

    public $table = 'remembers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'date',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'date' => 'date',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'numeric',
        'date' => 'required',
        'message' => 'min:2'
    ];

    

public function user()
    {
        return $this->belongsTo('App\User');
    }

}
