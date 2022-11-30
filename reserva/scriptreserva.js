function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../reserva/listarreserva.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
            console.log('Lista');
        } else {
            resultado.innerText = 'Error';
            console.log('NO Entra');
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        listar('');
    } else {
        listar(filtro);
    }
});

listar('');

function Eliminar(id_registro) {
    //generar ajax

    const formdata = new FormData();
    formdata.append('id_registro', id_registro);
    console.log(id_registro)

    const ajax = new XMLHttpRequest();

    ajax.open("POST", "../reserva/eliminarreserva.php");

    ajax.onload = function() {
        if (ajax.status == 200) {
            if (ajax.responseText === "OK") {
                alert('Elemento eliminado con id: ' + id_registro);
                listar('');
            }
        } else {
            console.log("no va el else");
            alert("no 200");
            // alert('Elemento eliminado con id: ' + id_empleado);
            //listar('');
        }
    };
    ajax.send(formdata);
}


// function crear() {
//     var form = document.getElementById('crearreserva');
//     const formdata = new FormData(form);

//     const ajax = new XMLHttpRequest();

//     ajax.open("POST", "../reserva/crearreserva.php");
//     ajax.onload = function() {
//         console.log(ajax.responseText);
//         if (ajax.status === 200) {
//             console.log(ajax.responseText);
//             if (ajax.responseText == "OK") {
//                 listar('');
//             }
//         } else {
//             alert('Algo ha salido mal');
//         }
//     };
//     ajax.send(formdata);
//     form.reset();
// }
function crear() {

    var form = document.getElementById('crearreserva');
    console.log(form);
    const formdata = new FormData(form);


    const ajax = new XMLHttpRequest();
    console.log(ajax);
    ajax.open("POST", "../reserva/crearreserva.php");
    // console.log(ajax);
    ajax.onload = function() {
        if (ajax.status === 200) {
            console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
                alert('Elemento creado con id: ');
                listar('');
                // console.log('hola');
            }
        } else {
            alert('errorisimo');
            // console.log('adios');
        }
    };
    ajax.send(formdata);
    // form.reset();
}


crearreserva.addEventListener("submit", (event) => {
    event.preventDefault();
    crear();
});

// function Cerrar() {
//     div = document.getElementById('flotante');
//     div.style.display = 'none';
// }




function editar(id_empleado) {
    // var origen = document.getElementById("origen");
    // origen.value = id_empleado;
    console.log(id_empleado);
    var formdata = new FormData();
    formdata.append('id_empleado', id_empleado);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../Crud-Ajax/modalactualizar.php');
    // console.log(ajax)
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            console.log(ajax.responseText);
            //alert(json.apellido_camarero);
            document.getElementById('id_empleado').value = json.id_empleado;
            document.getElementById('nombre').value = json.nom_empleado;
            document.getElementById('mail').value = json.email;
            document.getElementById('password').value = json.password;
            document.getElementById('dni').value = json.dni_empleado;
            document.getElementById('apellido').value = json.ape_empleado;
            document.getElementById('cargo').value = json.fk_cargo_empleado;
            // document.getElementById('registrar').value = "Actualizar";
            let myModal = new bootstrap.Modal(document.getElementById('myModalEdit'), {});
            myModal.show();
        }
    }
    ajax.send(formdata);

}

//MODIFICAR


function update() {

    var form = document.getElementById('editempleado');
    console.log(form);
    const formdata = new FormData(form);


    const ajax = new XMLHttpRequest();
    console.log(ajax);
    ajax.open("POST", "../Crud-Ajax/modificar.php");
    // console.log(ajax);
    ajax.onload = function() {
        if (ajax.status === 200) {
            // console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
                alert('Elemento modificar con id: ');
                listar('');
                // console.log('hola');
            }
        } else {
            alert('errorisimo');
            // console.log('adios');
        }
    };
    ajax.send(formdata);
    // form.reset();
}