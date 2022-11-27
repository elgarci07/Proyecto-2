function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../reserva/listarreserva.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
            console.log('Entra');
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
            if (ajax.responseText == "OK") {
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

function crear() {
    // console.log('entra');
    //generar ajax
    var form = document.getElementById('frm');
    const formdata = new FormData(form);
    // formdata.append('id',id);

    const ajax = new XMLHttpRequest();
    console.log(ajax);
    ajax.open("POST", "crear.php");
    // console.log(ajax);
    ajax.onload = function() {
        if (ajax.status === 200) {
            // console.log(ajax.responseText);
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
}