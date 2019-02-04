<?php

namespace App\Repositories;

use App\Models\priority;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class priorityRepository
 * @package App\Repositories
 * @version December 12, 2018, 7:36 pm UTC
 *
 * @method priority findWithoutFail($id, $columns = ['*'])
 * @method priority find($id, $columns = ['*'])
 * @method priority first($columns = ['*'])
*/
class priorityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return priority::class;
    }
}
