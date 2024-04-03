@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Empleado</h2>
        </div>
        <div>
            <a href="{{route('empleado.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('empleado.update', $empleado)}}" method="POST">

        @csrf
        @method('PUT')

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Tipo de documento:</strong>
                <select name="tipo_doc" class="form-select" id="tipo_doc" required>
                    <option value="">-- Selecciona --</option>
                    <option value="CC" @selected("CC" == $empleado->tipo_doc)>Cedula de Ciudadanía</option>
                    <option value="TI" @selected("TI" == $empleado->tipo_doc)>Tarjeta de Identidad</option>
                    <option value="CE" @selected("CE" == $empleado->tipo_doc)>Cedula de Extranjeria</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Numero de Documento:</strong>
                <input type="text" name="num_doc" class="form-control" value="{{$empleado->num_doc}}" minlength="10" maxlength="10" required oninput="validarNumerico(this)">  
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="{{$empleado->nombre}}" minlength="3" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" value="{{$empleado->apellido}}" minlength="3" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo" class="form-control" value="{{$empleado->correo}}" required onblur="validarCorreo(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Cargo:</strong>
                    <select name="cargo" class="form-select" id="tipo_doc" required>
                        <option value="">-- Selecciona --</option>
                        <option value="Gerente" @selected("Gerente" == $empleado->cargo)>Gerente</option>
                        <option value="Recepcionista" @selected("Recepcionista" == $empleado->cargo)>Recepcionista</option>
                        <option value="P. Limpieza" @selected("P. Limpieza" == $empleado->cargo)>P. Limpieza</option>
                        <option value="P. Restaurante" @selected("P. Restaurante" == $empleado->cargo)>P. Restaurante</option>
                        <option value="Barista" @selected("Barista" == $empleado->cargo)>Barista</option>
                        <option value="Camarero" @selected("Camarero" == $empleado->cargo)>Camarero</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Ingreso Basico:</strong>
                    <input type="number" name="ingreso_basico" class="form-control" value="{{$empleado->ingreso_basico}}" required oninput="validarNumerico(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="text" name="telefono" class="form-control" value="{{$empleado->telefono}}" minlength="10" maxlength="10" required oninput="validarNumerico(this)"> 
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Activo" @selected("Activo" == $empleado->estado)>Activo</option>
                        <option value="Inactivo" @selected("Inactivo" == $empleado->estado)>Inactivo</option>
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