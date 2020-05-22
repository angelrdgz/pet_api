@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1 class="h3 mb-4 text-gray-800">Modificar Servicio</h1>
    </div>
    <div class="col-sm-2">
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
            <form method="post" action="{{ route('servicios.update', $service->id) }}">
          @method('PATCH')
          @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" name="name" value="{{ $service->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <small id="emailHelp" class="form-text text-muted text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <div class="col-sm-2">
                        <a href="{{ url('admin/servicios') }}" class="btn btn-secondary btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">

    </div>
</div>
@endsection