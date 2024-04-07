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