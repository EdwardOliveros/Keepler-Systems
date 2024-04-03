@extends('dashboard')

@section('content')

<div class="row">
    <div class="">
        <div>
            <h2>Editar Habitacion</h2>
        </div>
        <div>
            <a href="{{route('habitacion.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ha Ocurrido un error!</strong> Algo fue mal..<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('habitacion.update', $habitacion)}}" method="POST">

        @csrf
        @method('PUT')

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Numero:</strong>
                    <input type="text" name="numero" class="form-control" value="{{$habitacion->numero}}" maxlength="3" required oninput="validarNumerico(this)">               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Piso:</strong>
                    <input type="text" name="piso" class="form-control" value="{{$habitacion->piso}}" minlength="1" maxlength="2" required oninput="validarNumerico(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción...">{{$habitacion->descripcion}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
                <div class="form-group">
                    <select name="id_tipo_habitacion" id="" class="form-select" required>
                        @foreach($tipohabitacion as $tipohabitacion)
                        <option value="{{$tipohabitacion->id}}" {{ $tipohabitacion->id == $tipohabitacion->id_tipo_habitacion ? 'selected' : '' }}>{{ $tipohabitacion -> nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>              

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo_base" class="form-control" value="{{$habitacion->costo_base}}" required oninput="validarNumerico(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Disponible" @selected("Disponible" == $habitacion->estado)>Disponible</option>
                        <option value="Reservada" @selected("Reservada" == $habitacion->estado)>Reservada</option>
                        <option value="Ocupada" @selected("Ocupada" == $habitacion->estado)>Ocupada</option>
                        <option value="En Mantenimiento" @selected("En Mantenimiento" == $habitacion->estado)>En Mantenimiento</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

        </div>
    </form>
</div>

@endsection