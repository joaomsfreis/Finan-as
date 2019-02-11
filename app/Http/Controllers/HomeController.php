<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Auth::user()->transactions;
        $balance = 0.0;

        for ($i = 0; $i <= sizeof($transactions)-1; $i++) {
            $balance = $balance + $transactions[$i]->type*$transactions[$i]->value;
        }
        return view('home')->with('balance', round($balance, 2));
    }

    public function filter(Request $request){
        if ($request->date != 1){
            $result = Auth::user()->transactions;
            $transactions = array();
            for ($i = 0; $i <= sizeof($result)-1; $i++) {
                if ($result[$i]->date == $request->date) array_push($transactions, $result[$i]);
            }

            $dates = DB::table('transactions')
                ->select(DB::raw('date'))
                ->where('user_id', '=', Auth::user()->id)
                ->orderBy('date')
                ->orderBy('date')
                ->get();

            return view('transactions.index', ['transactions'=>$transactions, 'dates'=>$dates]);
        }else{
            $transations = Auth::user()->transactions;
            $dates = DB::table('transactions')
                ->where('user_id', '=', Auth::user()->id)
                ->groupBy('date')
                ->get();

            return view('transactions.index', ['transactions'=>$transations, 'dates'=>$dates]);
        }
    }

    public function chart(){
        return view('chart');
    }
}
