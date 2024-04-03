@extends('dashboard')

@section('content')

<div class="row">

    <div class="col-12">
        <div>
            <h2 class="text-black">Facturas</h2>
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
                <th>Fecha de Emision</th>
                <th>Id Reserva</th>
                <th>Nombre del Cliente</th>
                <th>Monto Total</th>
                <th>Metodo de Pago</th>
            </tr>

            @foreach($factura as $factura)
                    <tr>

                    <td class="fw-bold">{{ $factura-> fecha_emision}}</td>
                    
                    @if($factura->reserva)
                            <td>{{ $factura->reserva->id }}</td>
                        @else
                            <td>No disponible</td>
                        @endif

                        
                        <td class="fw-bold">{{ $factura-> nombre_cliente}}</td>
                        <td class="fw-bold">{{ $factura-> monto_total}}</td>
                        <td class="fw-bold">{{ $factura-> metodo_pago}}</td>
                    </tr>
                
            @endforeach

        </table>
    </div>


@endsection