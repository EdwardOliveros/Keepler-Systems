@extends('dashboard')

@section('content')

<div class="row">

    <div class="col-12">
        <div>
            <h2 class="text-black">Gestion de Empleados</h2>
        </div>
        <div>
            <a href="{{route('empleado.create')}}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">

        <table class="table table-bordered text-black">


            <tr class="text-secondary">
                <th>Tipo de Documento</th>
                <th>N° de Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Telefono</th>
                <th>Ingreso</th>
                
                <th>Estado</th>
            </tr>

            @foreach($empleado as $empleado)
                @if($empleado->id_rol == 3)
                    <tr>
                        <td>{{ $empleado->tipo_doc }}</td> 
                        <td class="fw-bold">{{ $empleado-> num_doc }}</td>
                        <td>{{ $empleado-> nombre }}</td>
                        <td>{{ $empleado-> apellido }}</td>
                        <td>{{ $empleado-> correo }}</td>
                        <td>{{ $empleado-> cargo }}</td>
                        <td>{{ $empleado-> telefono }}</td>
                        <td>{{ $empleado-> ingreso_basico }}</td>
                        <td> <span class="badge bg-warning fs-6">{{ $empleado->estado }}</span> </td>

                        

                        <td>
                            <a href="{{route('empleado.edit', $empleado)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('empleado.destroy', $empleado)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Desactivar</button>
                            </form>

                        </td>
                    </tr>
                @endif
            @endforeach

            

            
        </table>
    </div>
</div>

@endsection