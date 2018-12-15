<?php

namespace App\Repositories;

use App\Models\seen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class seenRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:35 pm UTC
 *
 * @method seen findWithoutFail($id, $columns = ['*'])
 * @method seen find($id, $columns = ['*'])
 * @method seen first($columns = ['*'])
*/
class seenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'task_id',
        'notif_id',
        'seen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return seen::class;
    }
}
