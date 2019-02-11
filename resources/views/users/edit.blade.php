@extends('layouts.app')

@section('content')
<div class="container bg-warning">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alterar imagem') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="figure">Imagem: </label>
                            <div class="col-md-6">
                                <input type="file" name="figure" id="figure" accept=".png, .jpg">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
