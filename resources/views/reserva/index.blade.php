@extends('dashboard')

@section('content')

<div class="row">

    <div class="col-12">
        <div>
            <h2 class="text-black">Reservas</h2>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">

        <table class="table table-bordered text-white">


            <tr class="text-secondary">
                <th>Habitacion</th>
                <th>Cliente</th>
                <th>Fecha de Emisión</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Final</th>
                <th>Cantidad de Adultos</th>
                <th>Cantidad de Niños</th>
                <th>Valor de la Reserva</th>
                <th>Petición Especial</th>
                <th>Metodo de Pago</th>
                <th>Estado</th>
            </tr>

            @foreach($reserva as $reserva)
                    <tr>
                    @if($reserva->habitacion)
                            <td>{{ $reserva->habitacion->numero }}</td>
                        @else
                            <td>No disponible</td>
                        @endif


                        @if($reserva->usuario)
                            <td>{{ $reserva->usuario->num_doc }} - {{ $reserva->usuario->nombre }}</td>
                        @else
                            <td>No disponible</td>
                        @endif

                        <td>{{ $reserva-> fecha_emision}}</td>
                        <td>{{ $reserva-> fecha_inicio}}</td>
                        <td >{{ $reserva-> fecha_fin}}</td>
                        <td>{{ $reserva-> cantidad_adultos}}</td>
                        <td>{{ $reserva-> cantidad_niños}}</td>
                        <td>{{ $reserva-> costo}}</td>
                        <td>{{ $reserva-> peticion_especial}}</td>

                        @if($reserva->metodo_pago)
                            <td>{{ $reserva->metodo_pago->nombre }}</td>
                        @else
                            <td>No disponible</td>
                        @endif

                        @if($reserva->estado_reserva)
                            <td> <span class="badge bg-warning fs-6">{{ $reserva->estado_reserva->nombre }}</span> </td>
                        @else
                            <td>No disponible</td>
                        @endif
                        

                        <td>
                            <a href="{{route('reserva.edit', $reserva)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('reserva.destroy', $reserva)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                
            @endforeach

        </table>
    </div>

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
                            <a href="{{route('reserva.show', $habitacion['id'])}}" class="btn btn-warning">Reservar</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- FIN TARJETAS DE HABITACIONES -->

    </div>

</div>

@endsection