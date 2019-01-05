<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version November 27, 2018, 7:45 pm UTC
 *
 * @property integer type_id
 * @property string title
 * @property string body
 * @property integer read
 * @property integer user_id
 */
class Notification extends Model
{
    use SoftDeletes;
    
    public $table = 'notifications';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type_id',
        'title',
        'body',
        'read',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'read' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_id' => 'required',
        'read' => 'numeric',
        'user_id' => 'numeric'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
