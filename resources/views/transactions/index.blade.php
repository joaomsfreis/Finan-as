@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-fluid bg-white rounded">
                    <br>
                    <h1 class="text-center"><strong>Minhas transações</strong></h1>
                    <br>

                    <form method="get" action="/filter">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Data</label>
                            </div>
                            <select class="custom-select" id="date" name="date">
                                <option value="1">Todas as transações</option>
                                @foreach($dates as $d)
                                    <option value="{{$d->date}}">{{$d->date}}</option>
                                @endforeach
                            </select>
                            <input class="btn btn-outline-secondary" type="submit" value="Filtrar">
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $t)
                            <tr @if ($t->type == -1) class="table-danger" @endif @if ($t->type == 1) class="table-success" @endif>
                                <th>{{$t->date}}</th>
                                <th>@if($t->type == -1) - @endif R$ {{ round($t->value, 2)}}</th>
                                <th>{{$t->desc}}</th>
                                {{--<th><a href="#">Editar</a></th>--}}
                                <th class="text-center">
                                    <form method="get" action="{{route('transactions.edit', $t->id)}}">
                                        @csrf
                                        <input type="submit" class="btn btn-outline-secondary" value="Editar">
                                    </form>
                                </th>
                                <th class="text-center">
                                    <form method="post" action="{{route('transactions.destroy', $t->id)}}" onsubmit="return confirm('Confirma exclusão?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-secondary" value="Excluir">
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
