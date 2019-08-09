@extends('layouts.admin')

@section('content')
<div class="card card-transparent">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <h3>Servicios</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-13">
                <form method="POST" action="/admin/servicios">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <small id="emailHelp" class="form-text text-muted text-danger"> {{$message}} </small>                        
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
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