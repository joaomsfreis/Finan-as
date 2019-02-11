@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container bg-white text-center">
                        <br>
                        <a href="{{route('users.edit', Auth::user()->id)}}"><img img @if(Auth::user()->figure == NULL) src="{{ asset('img/user.jpg') }}" @else src="{{ asset('img/'.Auth::user()->figure) }}" @endif style="height: 200px;width: 200px;"/><br><h5 class="badge badge-light">Alterar imagem</h5></a>
                        <br><br>
                        <h3>Nome: <strong>{{Auth::user()->name}}</strong></h3>
                        <h3>Email: <strong>{{Auth::user()->email}}</strong></h3>
                        <h3>Saldo: <strong>R$ {{$balance}}</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
