<?php

namespace App\Repositories;

use App\Models\periodco;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class periodcoRepository
 * @package App\Repositories
 * @version December 10, 2018, 9:29 pm UTC
 *
 * @method periodco findWithoutFail($id, $columns = ['*'])
 * @method periodco find($id, $columns = ['*'])
 * @method periodco first($columns = ['*'])
*/
class periodcoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'start_date',
        'end_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return periodco::class;
    }
}
