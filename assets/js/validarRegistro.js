const nombre = document.getElementById("name")
const apellido_pa = document.getElementById("apellido_pa")
const apellido_ma = document.getElementById("apellido_ma")
const email = document.getElementById("email")
const username = document.getElementById("username")
const pass = document.getElementById("password")
const pass2 = document.getElementById("password2")

const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=>{
    
    parrafo.innerHTML = ""
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

    if (nombre.value.length < 2){
        warnings += `El nombre no es valido <br>`
        entrar = true
    }

    if (apellido_pa.value.length < 2){
        warnings += `El apellido paterno no es valido <br>`
        entrar = true
    }

    if (apellido_ma.value.length < 2){
        warnings += `El apellido materno no es valido <br>`
        entrar = true
    }

    if (!regexEmail.test(email.value)){
        warnings += `El correo no es valido <br>`
        entrar = true
    }

    if (username.value.length < 4){
        warnings += `El nombre de usuario no es valido <br>`
        entrar = true
    }

    if (pass.value != pass2.value){
        warnings += `Las contraseñas no coinciden <br>`
        entrar = true
    } else if (pass.value.length < 8) {
        warnings += `La contraseña debe tener por lo menos 8 caracteres <br>`
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    } else {
        enviarDatos(nombre.value, email.value, apellido_pa.value, apellido_ma.value, username.value, pass.value)
    }

    

})

function enviarDatos(nombre, email, apellido_pa, apellido_ma, username, pass) {
    fetch('php/confirmarRegistro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nombre=' + encodeURIComponent(nombre) + '&email=' + encodeURIComponent(email) + '&apellido_pa=' + encodeURIComponent(apellido_pa) + '&apellido_ma=' + encodeURIComponent(apellido_ma) + '&username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(pass),

    }) .then(function (response) {
        console.log(response);
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.statusText);
        }
        return response.json();

    }) .then(function (data) {
        console.log('Respuesta del servidor:', data);

        if (data.message == '1'){
            console.log('Nice')
            
            swal("Registro exitoso", "Te registraste correctamente", "success")
            .then(() => {
                window.location.href = 'iniciarSesion.php'
            });

        } else {
            swal(data.message);
            swal("Ops!", data.message, "warning");
        }

    }) .catch(function (error) {
        console.error('Error al enviar datos:', error);
    });
}