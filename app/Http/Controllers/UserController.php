<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $transactions = $user->transactions;
        $balance = 0.0;

        for ($i = 0; $i <= sizeof($transactions)-1; $i++) {
            $balance = $balance + $transactions[$i]->type*$transactions[$i]->value;
        }
        return view('users.show')
            ->with('balance', round($balance, 2));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $imagem = $_FILES['figure']['tmp_name'];
        $tamanho = $_FILES['figure']['size'];
        $tipo = $_FILES['figure']['type'];
        $nome = $_FILES['figure']['name'];
        $destino = 'C:\wamp64\www\controle_financeiro\public\img/'.$_FILES['figure']['name'];
        $arquivo_tmp = $_FILES['figure']['tmp_name'];
        if ($nome == ""){
            $user->figure = NULL;
        }else{
            move_uploaded_file($arquivo_tmp, $destino);
            $user->figure = $nome;
        }
        $user->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
