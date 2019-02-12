<?php

namespace App\Repositories;

use App\Models\repository;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class repositoryRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:01 pm UTC
 *
 * @method repository findWithoutFail($id, $columns = ['*'])
 * @method repository find($id, $columns = ['*'])
 * @method repository first($columns = ['*'])
*/
class repositoryRepository extends BaseRepository
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
        return repository::class;
    }
}
