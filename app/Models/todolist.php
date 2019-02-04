<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class todo_list
 * @package App\Models
 * @version December 10, 2018, 8:39 pm UTC
 *
 * @property integer user_id
 * @property string note_name
 * @property integer done
 */
class todolist extends Model
{
    use SoftDeletes;

    public $table = 'todolists';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'note_name',
        'done'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'note_name' => 'string',
        'done' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'number',
        'note_name' => 'required'
    ];



    
}
