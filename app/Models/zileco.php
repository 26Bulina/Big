<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class zileco
 * @package App\Models
 * @version January 6, 2019, 12:42 am UTC
 *
 * @property integer user_id
 * @property integer tipconcediu_id
 * @property integer nr_zile
 */
class zileco extends Model
{
    use SoftDeletes;

    public $table = 'zilecos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'tipconcediu_id',
        'nr_zile'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'tipconcediu_id' => 'integer',
        'nr_zile' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'tipconcediu_id' => 'required',
        'nr_zile' => 'numeric'
    ];


public function tipconcediu()
    {
        return $this->belongsTo('App\Models\tipconcediu','tipconcediu_id');
    }

    
}
