<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('home1/style.css')}}">
    

    <title>Keepler-Systems</title>
</head>
<body>
@if(Auth::check())
    <div class="container">

        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{ asset('index1/logo.png') }}" alt="Hotel Awesome Logo">
                    <a href="{{ route('dashboard') }}" class='name'>
                        <h2>Keepler</h2>
                        <span class="danger">Systems</span>
                    </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
            @if(Auth::user()->rol->nombre === 'Administrador')
                <a href="{{ route('reserva.index') }}">
                    <span class="material-icons-sharp">
                        event
                    </span>
                    <h3>Reservas</h3>
                </a>
                <a href="{{ route('cliente.index') }}">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Clientes</h3>
                </a>
                <a href="{{ route('empleado.index') }}">
                    <span class="material-icons-sharp">
                        badge
                    </span>
                    <h3>Empleados</h3>
                </a>
                <a href="{{ route('habitacion.index') }}">
                    <span class="material-icons-sharp">
                        bed
                    </span>
                    <h3>Habitaciones</h3>
                </a>
                <a href="{{ route('servicio.index') }}">
                    <span class="material-icons-sharp">
                        pool
                    </span>
                    <h3>Servicios</h3>
                </a>
                <a href="{{ route('factura.index') }}">
                    <span class="material-icons-sharp">
                        request_quote
                    </span>
                    <h3>Facturas</h3>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </button>                    
                </form>
            @elseif(Auth::user()->rol->nombre === 'Empleado')
            @elseif(Auth::user()->rol->nombre === 'Cliente')
                
            @endif
            </div>
        </aside>
        <!-- End of Sidebar Section -->
        <main>
            
            @if(Route::currentRouteName() === 'dashboard')
                <h1>Analytics</h1>
                <!-- Analyses -->
                <div class="analyse">

                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Habitaciones Disponibles</h3>
                            <h1>{{ $habitacionesDisponibles }}</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                                <circle cx="38" cy="38" r="36" style="stroke-dasharray: {{ $porcentajeDisponibles }}, 100;"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{ round($porcentajeDisponibles, 2) }}%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Usuarios Registros</h3>
                            <h1>{{ $totalUsuarios }}</h1>
                        </div>
                        <div class="progresss">
                            <div class="percentage">
                            <span class="material-icons-sharp">
                                person_outline
                            </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Reservacion</h3>
                            <h1>10</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- End of Analyses -->
            @endif
            

        
            <!-- Content-->
            <div class="recent-orders">
                @yield('content')
            </div>
        

        </main>

        <div class="right-section">
            <div class="nav">

                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>

                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>{{ Auth::user()->nombre}}</b></p>
                        <small class="text-muted">{{ Auth::user()->rol->nombre }}</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

          

        </div>
    </div>        
@endif

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5257ead9f1.js" crossorigin="anonymous"></script>

    <script>
    function validarNumerico(input) {
        var regex = /^[0-9]+$/;
        if(!regex.test(input.value)) {
            alert("Por favor, ingrese solo números.");
            input.value = input.value.replace(/[^\d]/g, ''); // Elimina cualquier caracter que no sea número
        }
    }

    function validarCorreo(input) {
        var correo = input.value;
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!regex.test(correo)) {
            alert("Por favor, ingrese un correo electrónico válido.");
            input.value = ""; // Limpia el campo si el formato es inválido
        }
    }

    function validarContraseña(input) {
        var contraseña = input.value;
        
        // Expresiones regulares para verificar si la contraseña cumple con los criterios
        var tieneMayuscula = /[A-Z]/.test(contraseña);
        var tieneMinuscula = /[a-z]/.test(contraseña);
        var tieneNumero = /[0-9]/.test(contraseña);
        var tieneCaracterEspecial = /[^A-Za-z0-9]/.test(contraseña);

        // Verificar si la contraseña cumple con todos los criterios
        if (tieneMayuscula && tieneMinuscula && tieneNumero && tieneCaracterEspecial) {
            alert("La contraseña cumple con los requisitos de seguridad.");
        } else {
            alert("La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial.");
            input.value = ""; // Limpiar el campo si la contraseña no cumple con los criterios
        }
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Obtener la ruta actual
        var currentUrl = window.location.href;

        // Iterar sobre los elementos <a>
        $("a").each(function() {
            var href = $(this).attr("href");
            
            // Verificar si la ruta actual coincide con la href del enlace
            if (currentUrl.includes(href)) {
                $(this).addClass("active"); // Agregar clase "active" si coincide
            } else {
                $(this).removeClass("active"); // Quitar clase "active" si no coincide
            }
        });
    });

    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');

    const darkMode = document.querySelector('.dark-mode');

    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    });

    darkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode-variables');
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
        
    })


    Orders.forEach(order => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${order.productName}</td>
            <td>${order.productNumber}</td>
            <td>${order.paymentStatus}</td>
            <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
            <td class="primary">Details</td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('table tbody').appendChild(tr);
    });
    </script>
</body>
</html>
    
