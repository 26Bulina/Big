<?php

namespace App;
use App\Models\watcher;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = [
        'name', 'email', 'password','admin','employee_id',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin' => 'integer',
        'email' => 'email',
        'password' => 'password',
        'employee_id' => 'integer',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }
    public function periodcos()
    {
        return $this->hasMany('App\Models\periodco');
    }

    public function remembers()
    {
        return $this->hasMany('App\Models\remember');
    }
    public function seens()
    {
        return $this->hasMany('App\Models\seen');
    }
  

    // public function watchers()
    // {
    //     return $this->hasMany('App\Models\watcher');
    // }
    public function nrZileCos()
    {
        return $this->hasMany('App\Models\nrzilecos');
    }


    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }


   public function watchers()
    {
        return $this->hasMany('App\Models\watcher');
    }




    public function notifs()
    {
        return $this->hasMany('App\Models\notifs');
    }

}
