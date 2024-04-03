@extends('dashboard')

@section('content')
<style>
    .info-client{
        background-color: var(--color-white);
        margin-top: 0.5em;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.7rem;
        padding: 1.4rem var(--card-padding);
        border-radius: var(--border-radius-2);
        box-shadow: var(--box-shadow);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .info-booking{
        background-color: var(--color-white);
        margin-top: 0.5em;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.7rem;
        padding: 1.4rem var(--card-padding);
        border-radius: var(--border-radius-2);
        box-shadow: var(--box-shadow);
        cursor: pointer;
        transition: all 0.3s ease;
    }
</style>

<div class="row">
    <div class="col-12">
        <div>
            <h2>Reserva</h2>
        </div>

        <div>
            <a href="{{route('reserva.index')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('reserva.store')}}" method="POST">

        @csrf

        <div class="info-booking">

            <h1>Datos de la Reserva</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Numero de Habitación:</strong>
                    <input type="hidden" name="id_habitacion" class="form-control" value="{{ $habitacion->id }}" required>
                    <input type="text" class="form-control" value="{{ $habitacion->numero }}" readonly>             
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Fecha de Inicio:</strong>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-.06556" required>               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Fecha Final:</strong>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>               
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Cantidad de Adultos:</strong>
                    <input type="text" name="cantidad_adultos" class="form-control" value="{{ old('cantidad_adultos') }}" minlength="1" maxlength="1" required oninput="validarNumerico(this)" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Cantidad de Niños:</strong>
                    <input type="text" name="cantidad_niños" class="form-control" value="{{ old('cantidad_niños') }}" minlength="1" maxlength="1" oninput="validarNumerico(this)" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo" class="form-control" value="{{ $habitacion->costo_base }}" readonly>          
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Peticion Especial:</strong>
                        <textarea class="form-control" style="height:150px" name="peticion_especial" placeholder="Descripción..."></textarea>
                    </div>
            </div>

        </div>
    
        <div class="info-client">

            <h1>Datos de Cliente</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    <select name="id_usuario" id="" class="form-select" required>
                        @foreach($usuario as $usuario)
                            @if($usuario->id_rol == 2)
                                <option value="{{$usuario->id}}">{{ $usuario -> nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
            

        

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Metodo De Pago:</strong>
                <select name="id_metodo_pago" class="form-select">
                    @foreach($metodo_pago as $metodo)
                        <option value="{{ $metodo->id }}">{{ $metodo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <input type="hidden" name="id_estado_reserva" value="2">
            <!-- <div class="form-group">
                <strong>Estado de la Reserva:</strong>
                <select name="id_estado_reserva" class="form-select" required>
                    @foreach($estado_reserva as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div> -->
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>

        </div>
    </form>
    
    <script>
    // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
        var today = new Date().toISOString().split('T')[0];
        
        // Establecer la fecha mínima para la fecha de inicio como la fecha actual
        document.getElementById("fecha_inicio").setAttribute("min", today);
        
        // Cuando se seleccione una fecha de inicio, actualizar la fecha mínima de la fecha final para que no sea anterior a la fecha de inicio
        document.getElementById("fecha_inicio").addEventListener("change", function() {
            document.getElementById("fecha_fin").setAttribute("min", this.value);
        });
    </script>
@endsection