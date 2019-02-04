<?php

namespace App\Repositories;

use App\Models\Job;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JobRepository
 * @package App\Repositories
 * @version January 5, 2019, 5:44 pm UTC
 *
 * @method Job findWithoutFail($id, $columns = ['*'])
 * @method Job find($id, $columns = ['*'])
 * @method Job first($columns = ['*'])
*/
class JobRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'departament_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Job::class;
    }
}
