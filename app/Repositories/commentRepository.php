<?php

namespace App\Repositories;

use App\Models\comment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class commentRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:37 pm UTC
 *
 * @method comment findWithoutFail($id, $columns = ['*'])
 * @method comment find($id, $columns = ['*'])
 * @method comment first($columns = ['*'])
*/
class commentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'body',
        'user_id',
        'task_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return comment::class;
    }
}
