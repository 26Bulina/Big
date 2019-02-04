<?php

namespace App\Repositories;

use App\Models\notif;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class notifRepository
 * @package App\Repositories
 * @version January 6, 2019, 1:04 am UTC
 *
 * @method notif findWithoutFail($id, $columns = ['*'])
 * @method notif find($id, $columns = ['*'])
 * @method notif first($columns = ['*'])
*/
class notifRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'body',
        'modif_app',
        'happy_team',
        'work_team'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return notif::class;
    }
}
