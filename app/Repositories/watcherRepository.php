<?php

namespace App\Repositories;

use App\Models\watcher;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class watcherRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:32 pm UTC
 *
 * @method watcher findWithoutFail($id, $columns = ['*'])
 * @method watcher find($id, $columns = ['*'])
 * @method watcher first($columns = ['*'])
*/
class watcherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'user_id',
        'watched'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return watcher::class;
    }
}
