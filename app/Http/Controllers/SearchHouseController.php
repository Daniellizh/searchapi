<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class SearchHouseController extends Controller
{
     public function index()
    {
        return view('fullTextSearch');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $data = House::search($request->get('text_search_query'))->get();
            return response()->json($data);
        }
    }
}
