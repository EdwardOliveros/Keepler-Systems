@extends('dashboard')

@section('content')

<h1>Usuarios</h1>

<a href="{{ route('cliente.index') }}">Ver Clientes</a>
<a href="{{ route('usuario.empleado.index') }}">Ver Empleados</a>

@endsection