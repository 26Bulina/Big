<?php

namespace App\Repositories;

use App\Models\zileco;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class zilecoRepository
 * @package App\Repositories
 * @version January 6, 2019, 12:42 am UTC
 *
 * @method zileco findWithoutFail($id, $columns = ['*'])
 * @method zileco find($id, $columns = ['*'])
 * @method zileco first($columns = ['*'])
*/
class zilecoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'tipconcediu_id',
        'nr_zile'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return zileco::class;
    }
}
