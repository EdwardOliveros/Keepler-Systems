<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="{{ asset('login1/styles.css')}}">
    <title>Login</title>

</head>
<body>
    <div class="container">

        <div class="forms-container">

            <!--FORMULARIOS-->
            <div class="signin-signup">
                <!--VALIDACIÓN-->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!--INICIO DE SESIÓN-->
                <form action="{{ route('login') }}" method="POST" class="sign-in-form" novalidate>
                    <!--LOGO-->
                    <div class="toggle">
                        <div class="logo">
                            <img src="{{ asset('index1/logo.png') }}" alt="Hotel Awesome Logo">
                        </div>
                    </div>

                    <h2 class="title">Inicia Sesión</h2>

                    @csrf

                    @if (session('mensaje'))
                        <h6>{{ session('mensaje')}}</h6>
                    @endif

                    <!--CORREO ELECTRONICO-->

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="correo" id="email" value="{{ old('correo') }}" required>
                        <label for="email" class="form-label">Correo Electrónico</label>
                    </div>
                    @error('correo') 
                        <h6>{{ $message }}</h6>
                    @enderror

                    <!--CONTRASEÑA-->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <div class="input-group">   
                            <input type="password" name="password" class="form-control" id="contraseña" required>
                            <label for="password" class="form-label">Contraseña</label>
                            <span class="eye material-icons-sharp">
                                visibility
                            </span>
                        </div>
                    </div>
                    @error('password') 
                        <h6>{{ $message }}</h6>
                    @enderror
                    
                    <!--BOTON INICIO DE SESIÓN-->
                    <input type="submit" value="Iniciar Sesión" class="btn solid" />
                    
                    <!--PLATAFORMAS SOCIALES-->
                    <p class="social-text">O Unete Usando Una plataforma Social</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <!--CREAR CUENTA-->
                <form action="{{ route('register.store') }}" method="POST" class="sign-up-form">

                    @csrf
                    <h2 class="title">Crear Cuenta</h2>

                    <!--TIPO DE DOCUMENTO-->
                    <div class="input-field">
                        <i class="fas fa-id-card"></i> 
                        <select name="tipo_doc" class="form-select" id="tipo_doc" required>
                            <option value="">-- Selecciona --</option>
                            <option value="CC">Cedula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cedula de Extranjeria</option>
                        </select>
                    </div>         

                    <!--NUMERO DE DOCUMENTO-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="num_doc" placeholder="Numero de Documento" value="{{ old('num_doc') }}" minlength="10" maxlength="10" required oninput="validarNumerico(this)">
                    </div>

                    <!--ROL-->
                    <input type="hidden" name="id_rol" value="2">

                    
                    <!--NOMBRE-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" minlength="3" required>
                    </div>

                    <!--APELLIDO-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" minlength="3" required>
                    </div>

                    <!--CORREO-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="correo" placeholder="Correo" value="{{ old('correo') }}" required onblur="validarCorreo(this)">
                    </div>

                    <!--CONTRASEÑA-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="contraseña" placeholder="Contraseña" value="{{ old('contraseña') }}" required onblur="validarContraseña(this)">
                    </div>

                    <!--TELEFONO-->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}" minlength="10" maxlength="10" required oninput="validarNumerico(this)">
                    </div>

                    <!--ESTADO-->
                    <input type="hidden" name="estado" value="Activo">


                    <input type="submit" class="btn" value="Registrarse" />

                    <p class="social-text">O Unete Usando Una plataforma Social</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">


                <div class="panel left-panel">
                <div class="content">
                    <h3>¿ Eres Nuevo ?</h3>
                    <p>
                    Registrate Aqui!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                    Crear Cuenta
                    </button>
                </div>
                <img src="{{ asset('login1/img/log.svg')}}" class="image" alt="Keepler's Logo  " />
                </div>


                <div class="panel right-panel">
                <div class="content">
                    <h3>¿ Ya Tienes Una Cuenta ?</h3>
                    <p>
                    Inicia Sesión.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                    Iniciar Sesíon
                    </button>
                </div>
                <img src="{{ asset('login1/img/register.svg')}}" class="image" alt="" />
                </div>
            </div>
            </div>

        </div>

    </div>

    <script src="{{ asset('js/login.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.input-field input').focus(function() {
        $(this).closest('.input-field').addClass('input-focused');
    });

    $('.input-field input').blur(function() {
        $(this).closest('.input-field').removeClass('input-focused');
    });
    });
    </script>

<script src="{{ asset('js/validation.js')}}"></script>

</div>  
</body>
</html>
    
