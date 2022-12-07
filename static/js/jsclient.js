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