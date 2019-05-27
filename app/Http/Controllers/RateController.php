<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use  Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    //
    public function getOuvrageRate($ouvrageId){
        $rate = DB::table('rates')->where('ouvrage_id', $ouvrageId)->get();
        dump($rate);   
    }
}
