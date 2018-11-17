<?php

namespace App\Repositories;

use App\Models\Type;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeRepository
 * @package App\Repositories
 * @version November 10, 2018, 1:42 pm UTC
 *
 * @method Type findWithoutFail($id, $columns = ['*'])
 * @method Type find($id, $columns = ['*'])
 * @method Type first($columns = ['*'])
*/
class TypeRepository extends BaseRepository
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
        return Type::class;
    }
}
