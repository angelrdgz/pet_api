@extends('layouts.admin')

@section('content')
<div class="card card-transparent">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <h1>Servicios</h1>
            </div>
            <div class="col-sm-2">
                <a href="{{url('admin/servicios/create')}}" class="btn btn-primary btn-block">Nuevo Servicio</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                <tr>
                    <td>{{ $service->id}}</td>
                    <td>{{ $service->name}}</td>
                    <td></td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center"><b>No hay servicios registrados</b></td>
                </tr>
                <p>No users</p>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection