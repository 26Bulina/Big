<?php

namespace App\Repositories;

use App\Models\empl;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class emplRepository
 * @package App\Repositories
 * @version December 9, 2018, 9:28 am UTC
 *
 * @method empl findWithoutFail($id, $columns = ['*'])
 * @method empl find($id, $columns = ['*'])
 * @method empl first($columns = ['*'])
*/
class emplRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return empl::class;
    }
}
