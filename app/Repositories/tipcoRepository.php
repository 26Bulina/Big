<?php

namespace App\Repositories;

use App\Models\tipco;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tipcoRepository
 * @package App\Repositories
 * @version January 6, 2019, 12:29 am UTC
 *
 * @method tipco findWithoutFail($id, $columns = ['*'])
 * @method tipco find($id, $columns = ['*'])
 * @method tipco first($columns = ['*'])
*/
class tipcoRepository extends BaseRepository
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
        return tipco::class;
    }
}
