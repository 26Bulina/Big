<?php

namespace App\Repositories;

use App\Models\departament;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class departamentRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:11 pm UTC
 *
 * @method departament findWithoutFail($id, $columns = ['*'])
 * @method departament find($id, $columns = ['*'])
 * @method departament first($columns = ['*'])
*/
class departamentRepository extends BaseRepository
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
        return departament::class;
    }
}
