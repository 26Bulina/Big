<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class notif
 * @package App\Models
 * @version January 6, 2019, 1:04 am UTC
 *
 * @property integer user_id
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
        'user_id',
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
        'user_id' => 'integer',
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
        'title' => 'required',
        'body' => 'required'
    ];
public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

public function seen()
    {
        return $this->belongsTo('App\Models\seen');
    }
    
}
