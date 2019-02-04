<?php

namespace App\Repositories;

use App\Models\nrZileCo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class nrZileCoRepository
 * @package App\Repositories
 * @version January 6, 2019, 12:28 am UTC
 *
 * @method nrZileCo findWithoutFail($id, $columns = ['*'])
 * @method nrZileCo find($id, $columns = ['*'])
 * @method nrZileCo first($columns = ['*'])
*/
class nrZileCoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nr_zile',
        'tipco_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return nrZileCo::class;
    }
}
