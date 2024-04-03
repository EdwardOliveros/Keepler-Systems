@extends('dashboard')

@section('content')

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        width: calc(33.33% - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .card-text {
        margin-bottom: 8px;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .card-active {
        background-color: #28a745; 
        border-color: #218838;
        color: #fff;
    }

    .card-inactive {
        background-color: #dc3545; 
        border-color: #c82333;
        color: #fff;
    }
</style>

<div class="">

    <div class="col-12">
        <div>
            <h2 class="text-black">Servicios</h2>
        </div>
        <div>
            <a href="{{ route('servicio.create') }}" class="btn btn-primary">Nuevo Servicio</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">

        <!-- TARJETAS DE SERVICIOS -->
        <div class="card-container">

            @foreach($servicio as $servicio)
            <div class="card @if($servicio->estado == 'Activo') card-active @elseif($servicio->estado == 'Inactivo') card-inactive @endif">

                    <div class="card-body">

                        <h5 class="card-title">Nombre: {{ $servicio->nombre }}</h5>
                        <p class="card-text">Descripcion: <span class="fw-bold">{{ $servicio->descripcion }}</span></p>
                        <p class="card-text">Costo: {{ $servicio->costo }}</p>                        
                        <p class="card-text">Estado: <span class="badge bg-warning fs-6">{{ $servicio->estado }}</span></p>

                        <div class="btn-container">
                            <a href="{{route('servicio.edit', $servicio)}}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('servicio.destroy', $servicio) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- FIN TARJETAS DE HABITACIONES -->


@endsection


