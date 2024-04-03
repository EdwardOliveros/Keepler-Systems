@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Cliente</h2>
        </div>
        <div>
            <a href="{{route('cliente.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('cliente.update', $cliente)}}" method="POST">

        @csrf
        @method('PUT')

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Tipo de documento:</strong>
                <select name="tipo_doc" class="form-select" id="tipo_doc" required>
                    <option value="">-- Selecciona --</option>
                    <option value="CC" @selected("CC" == $cliente->tipo_doc)>Cedula de Ciudadanía</option>
                    <option value="TI" @selected("TI" == $cliente->tipo_doc)>Tarjeta de Identidad</option>
                    <option value="CE" @selected("CE" == $cliente->tipo_doc)>Cedula de Extranjeria</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Numero de Documento:</strong>
                <input type="text" name="num_doc" class="form-control" value="{{$cliente->num_doc}}" minlength="10" maxlength="10" required oninput="validarNumerico(this)">  
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}" minlength="3" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" value="{{$cliente->apellido}}" minlength="3" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo" class="form-control" value="{{$cliente->correo}}" required onblur="validarCorreo(this)">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}" minlength="10" maxlength="10" required oninput="validarNumerico(this)"> 
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Activo" @selected("Activo" == $cliente->estado)>Activo</option>
                        <option value="Inactivo" @selected("Inactivo" == $cliente->estado)>Inactivo</option>
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