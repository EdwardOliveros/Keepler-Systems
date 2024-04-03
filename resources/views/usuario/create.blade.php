@extends('home')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Nuevo Cliente</h2>
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

    <form action="{{route('cliente.store')}}" method="POST">

        @csrf
        
        <div class="row">

           <!--TIPO DE DOCUMENTO-->
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tipo de documento:</strong>
                    <select name="tipo_doc" class="form-select" id="tipo_doc" required>
                        <option value="">-- Selecciona --</option>
                        <option value="CC">Cedula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cedula de Extranjeria</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Numero de Documento:</strong>
                    <input type="text" name="num_doc" class="form-control" required>                </div>
            </div>

            <!--ROL-->

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
                
                <!-- Campo oculto -->
                <input type="hidden" name="id_rol" value="2">
                
                    <!--LOGICA CON LISTA DESPLEGABLE-->


                <!-- <div class="form-group">
                    <select name="id_rol" id="" class="form-select" required>
                        @foreach($rol as $rol)
                        <option value="{{$rol->id}}" {{ $rol->id == 2 ? 'selected' : '' }}>{{ $rol -> nombre }}</option>
                        @endforeach
                    </select>
                </div> -->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    <input type="text" name="contraseña" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="text" name="telefono" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <style>
                    #estado{
                        display: none;
                    }
                </style>
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
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