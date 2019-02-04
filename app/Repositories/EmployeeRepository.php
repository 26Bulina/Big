<?php

namespace App\Repositories;

use App\Models\Employee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version January 5, 2019, 5:08 pm UTC
 *
 * @method Employee findWithoutFail($id, $columns = ['*'])
 * @method Employee find($id, $columns = ['*'])
 * @method Employee first($columns = ['*'])
*/
class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'cnp',
        'address',
        'personal_phone',
        'personal_email',
        'start_date',
        'end_date',
        'superior_id',
        'job',
        'photo',
        'hours_norm'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
