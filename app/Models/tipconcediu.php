<?php 

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipconcediu
 * @package App\Models
 * @version January 6, 2019, 12:39 am UTC
 *
 * @property string name
 * @property string description
 */
class tipconcediu extends Model
{
    use SoftDeletes;

    public $table = 'tipconcedius';
    

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
        'name' => 'required'
    ];


public function periodcos()
    {
        // return $this->belongTo('App\Models\periodco');
        return $this->hasMany('App\Models\periodco');
        
    }
public function zilecos()
    {
        return $this->hasMany('App\Models\zileco');
        // return $this->belongTo('App\Models\zileco');
    }
}
