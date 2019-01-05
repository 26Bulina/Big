<?php

namespace App\Models;
use Auth;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class task
 * @package App\Models
 * @version December 12, 2018, 9:23 pm UTC
 *
 * @property string subject
 * @property string body
 * @property integer pers_create
 * @property integer pers_assign
 * @property integer status_id
 * @property integer priority_id
 * @property integer repository_id
 * @property string fisier
 */
class task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'body',
        'pers_create',
        'pers_assign',
        'status_id',
        'priority_id',
        'repository_id',
        'fisier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subject' => 'string',
        'body' => 'string',
        'pers_create' => 'integer',
        'pers_assign' => 'integer',
        'status_id' => 'integer',
        'priority_id' => 'integer',
        'repository_id' => 'integer',
        'fisier' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subject' => 'required',
        'body' => 'required',
        'pers_create' => 'required',
        'pers_assign' => 'required'
    ];

public function status()
    {
        return $this->belongsTo('App\Models\status','status_id');
    }

public function repository()
    {
        return $this->belongsTo('App\Models\repository','repository_id');
    }
public function priority()
    {
        return $this->belongsTo('App\Models\Priority','priority_id');
    }
public function p_create()
    {
        return $this->belongsTo('App\User','pers_create');
    }
public function p_assign()
    {
        return $this->belongsTo('App\User','pers_assign');
    }
public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }
public function addComment($body)
    {
        
        // $this->comments()->create(compact('body'));
        Comment::create([
                'body'=>request('body'),
                'task_id'=>$this->id,
                'user_id' => Auth::user()->id 
        ]);
    }

public function countTask()
    {
    task::get()->count();
    }
}
