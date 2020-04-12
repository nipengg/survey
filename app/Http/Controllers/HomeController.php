<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request){
        $y1 = $request->y1;
        $y2 = $request->y2;
        $y3 = $request->y3;
        $y4 = $request->y4;
        $y5 = $request->y5;
        $y6 = $request->y6;
        $y6 = $request->y6;
        $y7 = $request->y7;
        $y8 = $request->y8;
        $y9 = $request->y9;
        $y10 = $request->y10;
        $y11 = $request->y11;
        $y12 = $request->y12;
        $y13 = $request->y13;
        $y14 = $request->y14;
        $y15 = $request->y15;
        $y16 = $request->y16;
        $y17 = $request->y17;
        $y18 = $request->y18;
        $y19 = $request->y19;
        $y20 = $request->y20;
        $y21 = $request->y21;

        // $n1 = $request->n1;
        // $n2 = $request->n2;
        // $n3 = $request->n3;
        // $n4 = $request->n4;
        // $n5 = $request->n5;
        // $n5 = $request->n5;
        // $n5 = $request->n5;
        // $n6 = $request->n6;
        // $n7 = $request->n7;
        // $n8 = $request->n8;
        // $n9 = $request->n9;
        // $n10 = $request->n10;
        // $n11 = $request->n11;
        // $n12 = $request->n12;
        // $n13 = $request->n13;
        // $n14 = $request->n14;
        // $n15 = $request->n15;
        // $n16 = $request->n16;
        // $n17 = $request->n17;
        // $n18 = $request->n18;
        // $n19 = $request->n19;
        // $n20 = $request->n20;
        // $n21 = $request->n21;

        $y = $y1 + $y2 + $y3 + $y4 + $y5 + $y6 + $y7 + $y8 + $y9 + $y10 + $y11 + $y12 + $y13 + $y14 + $y15 + $y16 + $y17 + $y18 + $y19 + $y20 + $y21;
        // $n = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9 + $n10 + $n11 + $n12 + $n13 + $n14 + $n15 + $n16 + $n17 + $n18 + $n19 + $n20 + $n21;

        DB::beginTransaction();
        $survey = new Survey();
        $survey->user_id = $request->id;
        $survey->yes = $y;
        $survey->no = 0;
        $survey->save();

        $id = $request->id;

        DB::update("
            UPDATE users
            SET token = token + 1
            WHERE id = ?
        ", [$id]);

        DB::commit();
        return view('/out');
        
    }

    public function out($id, Request $request){
        $data = [];
        $scores = DB::select('
                SELECT * FROM surveys WHERE user_id = ?
        ',[$id]);

        $data['scores'] = $scores;

        return view('score', $data);
    }

}
