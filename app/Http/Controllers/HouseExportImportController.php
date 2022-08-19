<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\HouseExport;
use App\Imports\HouseImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\House;

class HouseExportImportController extends Controller
{
    public function index()
    {
        $houses = House::get();
  
        return view('houses', compact('houses'));
    }

    public function export() 
    {
        return Excel::download(new HouseExport, 'houses.xlsx');
    }

    public function import() 
    {
        Excel::import(new HouseImport,request()->file('file'));
               
        return back();
    }
}
