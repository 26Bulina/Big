<?php

namespace App\Repositories;

use App\Models\todolist;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class todo_listRepository
 * @package App\Repositories
 * @version December 10, 2018, 8:39 pm UTC
 *
 * @method todo_list findWithoutFail($id, $columns = ['*'])
 * @method todo_list find($id, $columns = ['*'])
 * @method todo_list first($columns = ['*'])
*/
class todolistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'note_name',
        'done'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return todolist::class;
    }
}
