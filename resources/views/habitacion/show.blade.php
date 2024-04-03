@extends('dashboard')

@section('content')

<h1>Room Details</h1>

    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Numero de Habitación:</strong>
            <input type="text" class="form-control" value="{{ $habitacion->numero }}" readonly>               
        </div>
    </div>

    <strong>Costo:</strong>
    <input type="text" class="form-control" value="{{ $habitacion->costo_base }}" readonly>

    

@endsection