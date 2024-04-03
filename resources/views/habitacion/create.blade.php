@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Nueva Habitacion</h2>
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

    <form action="{{route('habitacion.store')}}" method="POST">

        @csrf


            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Numero:</strong>
                    <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" maxlength="3" required oninput="validarNumerico(this)">               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Piso:</strong>
                    <input type="text" name="piso" class="form-control" value="{{ old('piso') }}" minlength="1" maxlength="2" required oninput="validarNumerico(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción..."></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
                <div class="form-group">
                    <select name="id_tipo_habitacion" id="" class="form-select" required>
                        @foreach($tipohabitacion as $tipohabitacion)
                        <option value="{{$tipohabitacion->id}}">{{ $tipohabitacion -> nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo_base" class="form-control" value="{{ old('costo_base') }}" required oninput="validarNumerico(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Disponible">Disponible</option>
                        <option value="Reservada">Reservada</option>
                        <option value="Ocupada">Ocupada</option>
                        <option value="En Mantenimiento">En Mantenimiento</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </div>
    </form>
</div>

@endsection