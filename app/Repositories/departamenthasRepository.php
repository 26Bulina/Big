<?php

namespace App\Repositories;

use App\Models\departamenthas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class departament_hasRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:40 pm UTC
 *
 * @method departament_has findWithoutFail($id, $columns = ['*'])
 * @method departament_has find($id, $columns = ['*'])
 * @method departament_has first($columns = ['*'])
*/
class departamenthasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'user_id',
        'departament_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return departamenthas::class;
    }
}
