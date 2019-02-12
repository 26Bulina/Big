<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @package App\Models
 * @version January 5, 2019, 5:08 pm UTC
 *
 * @property string name
 * @property string last_name
 * @property integer cnp
 * @property string address
 * @property integer personal_phone
 * @property string personal_email
 * @property date start_date
 * @property date end_date
 * @property integer superior_id
 * @property string job
 * @property string photo
 * @property integer hours_norm
 */
class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employees';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'cnp',
        'address',
        'personal_phone',
        'personal_email',
        'start_date',
        'end_date',
        'superior_id',
        'job',
        'admin',
        'photo',
        'hours_norm'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'cnp' => 'integer',
        'address' => 'string',
        'personal_phone' => 'integer',
        'personal_email' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'superior_id' => 'integer',
        'job' => 'string',
        'admin' => 'integer',
        'taked' => 'integer',
        'photo' => 'string',
        'hours_norm' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'min:3',
        'last_name' => 'min:3',
        'cnp' => 'numeric',
        'address' => 'min:5',
        'start_date' => 'sometimes|required',
        'personal_phone'=>'regex:/(07)[0-9]{8}/',
        'job' => 'required',
        'superior_id' => 'required'
    ];



public function user()
    {
        return $this->hasOne('App\User');
    }
public function jobb()
    {
        return $this->belongsTo('App\Models\job','job');
        // return $this->hasMany('App\Models\job');
    }


public function superior()
    {
        return $this->belongsTo('App\Models\Employee');
    }
public function subaltern()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
