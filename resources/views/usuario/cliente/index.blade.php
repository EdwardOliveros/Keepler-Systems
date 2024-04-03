@extends('dashboard')

@section('content')

<div class="row">

    <div class="col-12">
        <div>
            <h2>Gestion de Clientes</h2>
        </div>
        <div>
            <a href="{{route('cliente.create')}}" class="btn btn-primary">Nuevo</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif

    <div class="col-12 mt-4">

            <!--TABLA CLIENTE-->

        <table class="table table-bordered text-white">


            <tr class="text-secondary">
                <th>Tipo de Documento</th>
                <th>N° de Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Estado</th>
            </tr>
            @foreach($cliente as $cliente)
                @if($cliente->id_rol == 2)
                    <tr>
                        <td>{{ $cliente->tipo_doc }}</td> 
                        <td class="fw-bold">{{ $cliente-> num_doc }}</td>
                        <td>{{ $cliente-> nombre }}</td>
                        <td>{{ $cliente-> apellido }}</td>
                        <td>{{ $cliente-> correo }}</td>
                        <td>{{ $cliente-> telefono }}</td>
                        <td> <span class="badge bg-warning fs-6">{{ $cliente->estado }}</span> </td>

                        

                        <td>
                            <a href="{{route('cliente.edit', $cliente)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('cliente.destroy', $cliente)}}" method="post" class="d-inline">
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