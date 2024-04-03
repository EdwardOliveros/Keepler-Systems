<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login1/styles.css')}}">
    <title>Login</title>

</head>
<body>
    <div class="container-form login">

        <div class="information">
            <div class="info-childs">

                <div class="logo">
                    <img src="{{ asset('index1/logo.png') }}" alt="Hotel Awesome Logo">
                </div>
                <h2>Bienvenido Nuevamente</h2>
                <p>Para Acceder por favor Inicia Sesion</p>
            </div>
        </div>

        <div class="form-information">
            <div class="form-information-childs">
            
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="form" novalidate>
                    @csrf

                    @if (session('mensaje'))
                        <h6>{{ session('mensaje')}}</h6>
                    @endif

                    <div class="input-field">
                        <div class="input-group">
                            <input type="email" name="correo" class="form-control" id="email" value="{{ old('correo') }}" required>
                            <label for="email" class="form-label">Correo Electrónico</label>
                        </div>
                    </div>
                    @error('correo') 
                        <h6>{{ $message }}</h6>
                    @enderror

                    <div class="input-field">
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
                    

                    <button type="submit" class="login">Iniciar Sesión</button>
                    
                    <p class="mt-3">¿No tienes una cuenta? <a href="{{ route('register.create') }}">Regístrate aquí</a></p>
                </form>

                

            </div>

        </div>

    </div>
</div>  
</body>

    <script>
        const pass = document.getElementById('contraseña'),
                icon = document.querySelector('.eye');

        icon.addEventListener("click", e => {
            if (pass.type === "password"){
                pass.type = "text";
                icon.textContent = 'visibility_off'
            } else {
                pass.type ="password"
                icon.textContent = 'visibility';
            }
        })
    </script>
</html>
    
