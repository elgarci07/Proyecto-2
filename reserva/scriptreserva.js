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
    // console.log(form);
    const formdata = new FormData(form);


    const ajax = new XMLHttpRequest();
    console.log("llega");
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




function editar(id_registro) {
    // var origen = document.getElementById("origen");
    // origen.value = id_empleado;
    console.log(id_registro);
    var formdata = new FormData();
    formdata.append('id_registro', id_registro);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../reserva/modalreserva.php');
    // console.log(ajax)
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            console.log(ajax.responseText);
            //alert(json.apellido_camarero);
            document.getElementById('id_registro').value = json.id_registro;
            document.getElementById('cliente').value = json.cliente;
            document.getElementById('fecha').value = json.fecha;
            document.getElementById('hora').value = json.hora;
            document.getElementById('id_mesa').value = json.id_mesa;
            document.getElementById('id_camarero').value = json.id_camarero;
            document.getElementById('comensales').value = json.num_comensales;

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


// crearreserva.addEventListener("change", (event) => {
//     event.preventDefault();
//     crear();
// });


// const getHora = (comida) => {
//     const ajax = new XMLHttpRequest();
//     const formdata = new FormData();
//     formdata.append('comida', comida)
//     ajax.open('POST', '../controller/get_comida_hora.php');
//     ajax.onload = () => {
//         if (ajax.status == 200) {
//             console.log(ajax.responseText)
//             let resul = JSON.parse(ajax.responseText);
//             let horas = resul[0].horas.split(',');
//             var resul_horas = '';
//             horas.forEach(element => {
//                 resul_horas += `<option value="${element}">${element}</option>`;
//             });
//             document.getElementById('hora_f').innerHTML = resul_horas;
//         }

//     }
//     ajax.send(formdata);
// }