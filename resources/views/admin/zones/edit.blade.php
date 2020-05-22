@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Modificar Zona</h1>
<div class="card card-transparent">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
            <form method="post" action="{{ route('zonas.update', $zone->id) }}">
          @method('PATCH')
          @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" name="name" value="{{ $zone->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <small id="emailHelp" class="form-text text-muted text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Servicio de Zona</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:80px;">
                                            <div class="form-check">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switch0">
                                                    <label class="custom-control-label" for="switch0"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Servicio</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                        <td class="text-center" style="width:80px;">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="custom-control-input" {{array_key_exists($service->id, $ids) == true ? "checked":""}} id="switch{{$service->id}}">
                                                <label class="custom-control-label" for="switch{{$service->id}}" name="services[]"></label>
                                            </div>
                                        </td>
                                        <td>{{$service->name}}</td>
                                        <td>
                                            <input type="text" class="form-control text-right number" {{array_key_exists($service->id, $ids) == true ? "":"readonly"}} name="prices[]" value="{{array_key_exists($service->id, $ids) == true ? $service->getPrice($zone->id, $service->id)->price:"0"}}">
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
                    <div class="row">
                        <div class="col-sm-2 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <div class="col-sm-2">
                        <a href="{{ url('admin/zonas') }}" class="btn btn-secondary btn-block">Cancelar</a>
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('thead input[type="checkbox"]').change(function() {
            if (this.checked) {
                for (let index = 0; index < $('.table tbody tr').length; index++) {
                    if (!$('.table tbody tr').eq(index).find('input[type="checkbox"]').is(":checked")) {
                        $('.table tbody tr').eq(index).find('input[type="checkbox"]').trigger("click");
                    }
                }
            } else {
                for (let index = 0; index < $('.table tbody tr').length; index++) {
                    if ($('.table tbody tr').eq(index).find('input[type="checkbox"]').is(":checked")) {
                        $('.table tbody tr').eq(index).find('input[type="checkbox"]').trigger("click");
                    }
                }
            }
        });

        $('tbody input[type="checkbox"]').change(function() {
            if (this.checked) {
                $(this).closest('tr').find("input[type='text']").attr('readonly', false);
            } else {
                $(this).closest('tr').find("input[type='text']").attr('readonly', true);
                $(this).closest('tr').find("input[type='text']").val(0);
            }
        });
    });
</script>
@endsection