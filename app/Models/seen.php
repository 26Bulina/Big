<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class seen
 * @package App\Models
 * @version December 12, 2018, 9:35 pm UTC
 *
 * @property integer user_id
 * @property integer task_id
 * @property integer notif_id
 * @property integer seen
 */
class seen extends Model
{
    use SoftDeletes;

    public $table = 'seens';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'task_id',
        'seen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'task_id' => 'integer',
        'seen' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seen' => 'required'
    ];

    
        public function notifs()
    {
        return $this->hasMany('App\Model\notif');
    }

}
