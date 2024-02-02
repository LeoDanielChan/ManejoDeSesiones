const username = document.getElementById("username")
const pass = document.getElementById("password")

const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=>{

    parrafo.innerHTML = ""
    e.preventDefault()
    let warnings = ""
    let entrar = false

    if (username.value.length < 4 || pass.value.length < 8){
        swal("Ops!", 'Nombre de usuario o contraseña incorrecto', "warning");
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    } else {
        enviarDatos(username.value, pass.value)
    }


})

function enviarDatos(username, pass) {
    fetch('php/confirmarInicio.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(pass),

    }) .then(function (response) {
        console.log(response);
        if (!response.ok) {
            throw new Error('Elor en la solicitud: ' + response.statusText);
        }
        
        return response.json();

    }) .then(function (data) {
        console.log('Respuesta del servidor:', data);
        
        if (data.identificar == '1'){
            
            swal("Todo bien",'',"success")
            .then(() => {
                location.href = 'index.php'
            });

        } else {
            swal("Ops!", data.message, "warning");
        }

    }) .catch(function (error) {
        swal("Ops!", data.message, "warning");
        console.error('E al enviar datos:', error);
    });
}