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

    .card-available {
        background-color: #28a745; /* Verde para "Disponible" */
        border-color: #218838;
        color: #fff;
    }

    .card-occupied {
        background-color: #dc3545; /* Rojo para "Ocupada" */
        border-color: #c82333;
        color: #fff;
    }
</style>

<div class="">

    <div class="col-12">
        <div>
            <h2 class="text-black">Habitaciones</h2>
        </div>
        <div>
            <a href="{{ route('habitacion.create') }}" class="btn btn-primary">Nueva Habitacion</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">

        <!-- TARJETAS DE HABITACIONES -->
        <div class="card-container">

            @foreach($habitacion as $habitacion)
            <div class="card @if($habitacion->estado == 'Disponible') card-available @elseif($habitacion->estado == 'Ocupada') card-occupied @endif">

                    <div class="card-body">

                        <h5 class="card-title">Habitación {{ $habitacion->numero }}</h5>
                        <p class="card-text">Piso: <span class="fw-bold">{{ $habitacion->piso }}</span></p>
                        <p class="card-text">Tipo de Habitación: 
                            @if($habitacion->tipoHabitacion)
                                {{ $habitacion->tipoHabitacion->nombre }}
                            @else
                                No disponible
                            @endif
                        </p>
                        <p class="card-text">Descripción: {{ $habitacion->descripcion }}</p>
                        <p class="card-text">Costo: {{ $habitacion->costo_base }}</p>
                        <p class="card-text">Estado: <span class="badge bg-warning fs-6">{{ $habitacion->estado }}</span></p>

                        <div class="btn-container">
                            <a href="{{route('habitacion.edit', $habitacion)}}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('habitacion.destroy', $habitacion) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                            <a href="{{route('habitacion.show', $habitacion['id'])}}" class="btn btn-warning">Ver</a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- FIN TARJETAS DE HABITACIONES -->



@endsection


