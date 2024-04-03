<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
}

.container-form{
    display: flex;
     border-radius: 20px;
    box-shadow: 0 5px 7px rgba(0, 0, 0, -1);
    height: 500px;
    max-width: 1400px;
    margin: 10px;
    background-color: white;
}
    </style>
</head>
<body>
    <div class="container-form">
            <form action="{{route('register.store')}}" method="POST">
    </div>
</body>
</html>

        @csrf
        
        <div class="row">

           <!--TIPO DE DOCUMENTO-->
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tipo de documento:</strong>
                    <select name="tipo_doc" class="form-select" id="tipo_doc" required>
                        <option value="">-- Selecciona --</option>
                        <option value="CC">Cedula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cedula de Extranjeria</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Numero de Documento:</strong>
                    <input type="text" name="num_doc" class="form-control" required>                </div>
            </div>

            <!--ROL-->

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2  ">
                
                <!-- Campo oculto -->
                <input type="hidden" name="id_rol" value="2">
                
                    <!--LOGICA CON LISTA DESPLEGABLE-->


                <!-- <div class="form-group">
                    <select name="id_rol" id="" class="form-select" required>
                        @foreach($rol as $rol)
                        <option value="{{$rol->id}}" {{ $rol->id == 2 ? 'selected' : '' }}>{{ $rol -> nombre }}</option>
                        @endforeach
                    </select>
                </div> -->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    <input type="text" name="contraseña" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="text" name="telefono" class="form-control" required>                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <style>
                    #estado{
                        display: none;
                    }
                </style>
                <div class="form-group" id="estado">
                    <strong>Estado:</strong>
                    <select name="estado" class="form-select"  required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </div>
    </form>