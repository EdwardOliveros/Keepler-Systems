@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2>Nuevo Servicio</h2>
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

    <form action="{{route('servicio.store')}}" method="POST">

        @csrf


            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" required>               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción..."></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo" class="form-control" required>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </div>
    </form>
</div>

@endsection