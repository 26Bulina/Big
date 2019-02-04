<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class taskRepository
 * @package App\Repositories
 * @version December 12, 2018, 9:23 pm UTC
 *
 * @method task findWithoutFail($id, $columns = ['*'])
 * @method task find($id, $columns = ['*'])
 * @method task first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 
        'email', 
        'admin',
        'employee_id',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
