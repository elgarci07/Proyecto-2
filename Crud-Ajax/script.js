function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', 'listar.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
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

function Eliminar(id_empleado) {
    //generar ajax

    const formdata = new FormData();
    formdata.append('id_empleado', id_empleado);
    console.log(id_empleado)

    const ajax = new XMLHttpRequest();

    ajax.open("POST", "eliminar.php");

    ajax.onload = function() {
        if (ajax.status == 200) {
            if (ajax.responseText == "OK") {
                alert('Elemento eliminado con id: ' + id_empleado);
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

    var form = document.getElementById('crearempleado');
    console.log(form);
    const formdata = new FormData(form);


    const ajax = new XMLHttpRequest();
    console.log(ajax);
    ajax.open("POST", "../Crud-Ajax/crear.php");
    // console.log(ajax);
    ajax.onload = function() {
        if (ajax.status === 200) {
            console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
                Swal.fire(
                    'Reservado!',
                    'Tu reserva a sido creada con exito!',
                    'success')
                listar('');
                // console.log('hola');
            }
        } else {
            Swal.fire(
                    'Algo a salido!',
                    'Comprueba que todos los campos sean correctos!',
                    'error')
                // console.log('adios');
        }
    };
    ajax.send(formdata);
    // form.reset();
}


crearempleado.addEventListener("submit", (event) => {
    // var queboton = getElementByName(''); //Recoge id del boton crear o editar para saber cual usar
    event.preventDefault();
    // var origen = document.getElementById("origen");
    // console.log(origen.value);
    // if (origen.value == "empleado") {
    crear();
    // } else {
    //     editar(origen.value);
    // };

});

editempleado.addEventListener("submit", (event) => {
    // var queboton = getElementByName(''); //Recoge id del boton crear o editar para saber cual usar
    event.preventDefault();
    // var origen = document.getElementById("origen");
    // console.log(origen.value);
    // if (origen.value == "empleado") {
    update();
    // } else {
    //     editar(origen.value);
    // };

});


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