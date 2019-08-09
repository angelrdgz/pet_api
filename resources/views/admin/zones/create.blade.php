@extends('layouts.admin')

@section('content')
<div class="card card-transparent">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <h3>Nueva Zona</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="/admin/zonas">
                    @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <small id="emailHelp" class="form-text text-muted text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <h3>Servicio de Zona</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                        <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            </div>
                                        </th>
                                        <th>Servicio</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" value="{{$service->id}}" name="services[]" id="defaultCheck1">
                                        </td>
                                        <td>{{$service->name}}</td>
                                        <td>
                                            <input type="text" class="form-control" name="prices[]" value="0">
                                        </td>
                                    </tr>
                                    @endforeach
                                    @error('services')
                                    <tr>
                                        <td colspan="3" class="text-center">
                                        <small id="emailHelp" class="form-text text-muted text-danger"> {{$message}} </small>
                                        </td>
                                    </tr>                                     
                                    @enderror
                                </tbody>
                            </table>
                        </div>
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