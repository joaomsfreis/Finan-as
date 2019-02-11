<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transations = Auth::user()->transactions;
        $dates = DB::table('transactions')
            ->select(DB::raw('date'))
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('date')
            ->orderBy('date')
            ->get();



        return view('transactions.index', ['transactions'=>$transations, 'dates'=>$dates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->desc == "" || $request->value == "" || $request->date == ""){
            session()->flash('mensagem', 'Preencha todos os campos');
            return view('transactions.create');
        }

        Transaction::create($request->all());
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit')
            ->with('transaction', $transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        if ($request->desc == "" || $request->value == "" || $request->date == ""){
            session()->flash('mensagem', 'Preencha todos os campos');
            return view('transactions.edit')
                ->with('transaction', $transaction);
        }

        $transaction->fill($request->all());
        $transaction->save();

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
