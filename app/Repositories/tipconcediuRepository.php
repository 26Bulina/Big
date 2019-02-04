<?php

namespace App\Repositories;

use App\Models\tipconcediu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tipconcediuRepository
 * @package App\Repositories
 * @version January 6, 2019, 12:39 am UTC
 *
 * @method tipconcediu findWithoutFail($id, $columns = ['*'])
 * @method tipconcediu find($id, $columns = ['*'])
 * @method tipconcediu first($columns = ['*'])
*/
class tipconcediuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'tipconcediu_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tipconcediu::class;
    }
}
