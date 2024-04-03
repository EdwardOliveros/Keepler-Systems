@extends('dashboard')

@section('content')

<div class="row">
    <div class="">
        <div>
            <h2>Editar Servicio</h2>
        </div>
        <div>
            <a href="{{route('servicio.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('servicio.update', $servicio)}}" method="POST">

        @csrf
        @method('PUT')

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="{{$servicio->nombre}}" required>               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción...">{{$servicio->descripcion}}</textarea>
                </div>
            </div>          

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo" class="form-control" value="{{$servicio->costo}}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Activo" @selected("Activo" == $servicio->estado)>Activo</option>
                        <option value="Inactivo" @selected("Inactivo" == $servicio->estado)>Inactivo</option>
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