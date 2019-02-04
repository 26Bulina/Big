<?php

namespace App\Repositories;

use App\Models\Remember;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RememberRepository
 * @package App\Repositories
 * @version December 10, 2018, 8:30 pm UTC
 *
 * @method Remember findWithoutFail($id, $columns = ['*'])
 * @method Remember find($id, $columns = ['*'])
 * @method Remember first($columns = ['*'])
*/
class RememberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'date',
        'message'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Remember::class;
    }
}
