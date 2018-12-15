<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class periodco
 * @package App\Models
 * @version December 10, 2018, 9:29 pm UTC
 *
 * @property integer user_id
 * @property date start_date
 * @property date end_date
 */
class periodco extends Model
{
    use SoftDeletes;

    public $table = 'periodcos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    
}
