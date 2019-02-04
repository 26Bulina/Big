<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class status
 * @package App\Models
 * @version December 12, 2018, 7:27 pm UTC
 *
 * @property string name
 * @property string description
 */
class status extends Model
{
    use SoftDeletes;

    public $table = 'statuses';
    

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
        'name' => 'min:3'
    ];

    
    public function tasks()
    {
        return $this->hasMany('App\Model\Task');
    }
}
