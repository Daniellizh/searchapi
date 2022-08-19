<?php

namespace App\Exports;

use App\Models\House;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HouseExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return House::select("id", "name", "bedrooms", "bathrooms", "storeys", "garages", "price")->get();
    }

    public function headings(): array
    {
        return ["ID", "Name", "Bedrooms", "Bathrooms", "Storeys", "Garages", "Price"];
    }
}
