<?php

namespace App\Imports;

use App\Models\House;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class HouseImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new House([
            'name'     => $row['name'],
            'bedrooms'    => $row['bedrooms'], 
            'bathrooms' => $row['bathrooms'],
            'storeys' => $row['storeys'],
            'garages' => $row['garages'],
            'price' => $row['price'],
        ]);
    }
}
