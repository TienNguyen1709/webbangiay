<?php

namespace App\Exports;

use App\Models\CategoryProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoryProduct::all();
    }
}
