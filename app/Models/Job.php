<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 * @package App\Models
 * @version January 5, 2019, 5:44 pm UTC
 *
 * @property string name
 * @property string description
 * @property integer departament_id
 */
class Job extends Model
{
    use SoftDeletes;

    public $table = 'jobs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'departament_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'departament_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];


public function departament()
    {
        return $this->belongsTo('App\Models\Departament');
    }
public function employees() 
    {
        return $this->hasMany('App\Models\Employee','job');
        // return $this->belongsTo('App\Models\employee','job');
    }
    
}
