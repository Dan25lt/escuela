

/*
* Login de Usuario 
*/

var form = document.getElementById("iniciar");
form.addEventListener('click', handleLoginForm);

function handleLoginForm(event) {
    event.preventDefault();

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    let loginForm = new FormData(document.getElementById("loginForm"));

    fetch('./backend/login.php', {
        method: 'POST',
        body: loginForm
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            console.log(data);
            var response = JSON.parse(data);

            if (response.statusCode === 200) {
                document.getElementById("loginResult").innerHTML = response.msj + " tipo_usuario: " + response.puesto;

                // codigo para redireccionar,

                if (response.tipo_usuario == 'Administrador') {
                    location.replace("./admin.html");
                }
            } else if (response.statusCode === 403) {
                document.getElementById("loginResult").innerHTML = response.msj;
            }
        });
}

/*
* Todo lo referente a la UI
* Se mete todo en una sola funcion y se corre
*/
function userInterfaseInit() {

    function redireccionalpadrefamilia() {
        location.replace("./menu.html");
    }

    // crear el modal
    var modal = document.getElementById('id01');

    // se cierra si se hace click fuera de la ventana
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

// Inicializar las funciones aqui despues del codigo
userInterfaseInit();

function redireccionalpadrefamilia() {
    location.replace("./menu.html");
}
