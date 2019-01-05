<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class notif
 * @package App\Models
 * @version December 10, 2018, 9:34 pm UTC
 *
 * @property integer pers_create
 * @property string title
 * @property string body
 * @property integer modif_app
 * @property integer happy_team
 * @property integer work_team
 */
class notif extends Model
{
    use SoftDeletes;

    public $table = 'notifs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pers_create',
        'title',
        'body',
        'modif_app',
        'happy_team',
        'work_team'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pers_create' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'modif_app' => 'integer',
        'happy_team' => 'integer',
        'work_team' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pers_create' => 'required',
        'title' => 'required',
        'body' => 'min:5'
    ];
    
public function user()
    {
        return $this->belongsTo('App\User','pers_create');
    }
    
}
