@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-fluid bg-white rounded">
                    <br>
                    <h1 class="text-center"><strong>Adicionar transação</strong></h1>
                    <br>
                    @if (session('mensagem'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('mensagem') }}
                        </div>
                    @endif
                    <form method="post" action="/transactions">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="user_id">Usuário</label>
                            </div>
                            <select class="custom-select" id="user_id" name="user_id">
                                <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="type">Tipo da transação</label>
                            </div>
                            <select class="custom-select" id="type" name="type">
                                <option value="1">Receita</option>
                                <option value="-1">Despesa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desc">Descrição</label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Digite uma descrição">
                        </div>
                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="number" class="form-control" id="value" name="value" placeholder="Digite o valor" step=".01">
                        </div>
                        <div class="form-group">
                            <label for="date">Data</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
