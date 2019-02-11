@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center bg-dark text-white rounded-top"><strong>Meu saldo: R$ {{$balance}}</strong></h3>
            <div class="container-fluid bg-white rounded">
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-3 text-center">
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="badge badge-primary">
                            <img @if(Auth::user()->figure == NULL) src="{{ asset('img/user.jpg') }}" @else src="{{ asset('img/'.Auth::user()->figure) }}" @endif style="height: 200px;width: 200px;"/>
                            <br>
                            <h4>Meus dados</h4>
                        </a>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3 text-center">
                        <a href="{{route('transactions.index')}}" class="badge badge-warning">
                            <img src="{{ asset('img/tranferencia.png') }}" style="height: 200px;width: 200px;"/>
                            <br>
                            <h4>Minhas transações</h4>
                        </a>
                    </div>
                    <div class="col-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3 text-center">
                        <a href="{{route('transactions.create')}}" class="badge badge-success">
                            <img src="{{ asset('img/addtransferencia.png') }}" style="height: 200px;width: 200px;"/>
                            <br>
                            <h4>Adicionar transações</h4>
                        </a>
                    </div>
                    <div class="col-2"></div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
