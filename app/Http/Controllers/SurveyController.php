<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    public function store(Request $request){
        $y1 = $request->y1;
        $y2 = $request->y2;
        $y3 = $request->y3;

        $n1 = $request->n1;
        $n2 = $request->n2;
        $n3 = $request->n3;

        $y = $y1 + $y2 + $y3;
        $n = $n1 + $n2 + $n3;

        DB::beginTransaction();
        $survey = new Survey();
        $survey->user_id = Session::get('id');
        $survey->yes = $y;
        $survey->no = $n;
        $survey->save();

        DB::commit();
        return view('home');
        
    }
}
