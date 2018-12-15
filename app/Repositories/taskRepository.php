<?php

namespace App\Repositories;

use App\Models\task;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class taskRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:23 pm UTC
 *
 * @method task findWithoutFail($id, $columns = ['*'])
 * @method task find($id, $columns = ['*'])
 * @method task first($columns = ['*'])
*/
class taskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return task::class;
    }
}
