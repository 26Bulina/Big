<?php

namespace App\Exports;

use App\Models\task;
use Maatwebsite\Excel\Concerns\FromCollection;

class TasksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return task::all();
    }


     public function export() 
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
