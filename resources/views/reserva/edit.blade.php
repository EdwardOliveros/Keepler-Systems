@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Reserva Habitacion</h2>
        </div>
        <div>
            <a href="{{route('reserva.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('reserva.update', $reserva)}}" method="POST">

        @csrf
        @method('PUT')

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Habitacion:</strong>
                <select name="id_habitacion" class="form-select" required>
                    @foreach($habitacion as $habitacion)
                        <option value="{{ $habitacion->id }}">{{ $habitacion->numero }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
            <div class="form-group">
                <strong>Costo:</strong>
                <input type="text" name="costo" class="form-control" value="{{$reserva->costo}}"  required>
            </div>
        </div>
 

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
            <div class="form-group">
                <select name="id_usuario" id="" class="form-select" required>
                    @foreach($usuario as $usuario)
                    <option value="{{$usuario->id}}" {{ $usuario->id == $usuario->id_usuario ? 'selected' : '' }}>{{ $usuario -> nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Fecha de Inicio:</strong>
                <input type="date" name="fecha_inicio" class="form-control" value={{$reserva->fecha_inicio}} required>               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Fecha Final:</strong>
                <input type="date" name="fecha_fin" class="form-control" value={{$reserva->fecha_fin}} required>               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Cantidad de Adultos:</strong>
                <input type="text" name="cantidad_adultos" class="form-control" value="{{$reserva->cantidad_adultos}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Cantidad de Niños:</strong>
                <input type="text" name="cantidad_niños" class="form-control" value="{{$reserva->cantidad_niños}}">
            </div>
        </div>
         

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Peticion Especial:</strong>
                    <textarea class="form-control" style="height:150px" name="peticion_especial" placeholder="Descripción..."></textarea>
                </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Estado de la Reserva:</strong>
                <select name="id_estado_reserva" class="form-select" required>
                    @foreach($estado_reserva as $estado)
                        <option value="{{ $estado->id }}" {{ $estado->id == $estado->id_estado_reserva ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                    @endforeach
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