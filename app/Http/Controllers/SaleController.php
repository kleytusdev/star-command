<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function getSales(){
        $sales = Sale::all();

        return response()->json($sales);
    }
}