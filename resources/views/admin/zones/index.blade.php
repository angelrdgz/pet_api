@extends('layouts.admin')

@section('content')
<div class="card card-transparent">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
            <h1>Zonas</h1>
            </div>
            <div class="col-sm-2">
                <a href="{{url('admin/zonas/create')}}" class="btn btn-primary btn-block">Nueva Zona</a>
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
                    <th># de Servicios</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($zones as $zone)
                <tr>
                    <td>{{ $zone->id }}</td>
                    <td>{{ $zone->name }}</td>
                    <td>{{ $zone->services->count() }}</td>
                    <td>{{ $zone->id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection