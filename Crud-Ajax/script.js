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
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                alert('Elemento eliminado con id: ' + id_empleado);
                listar('');
            }
        } else {
            console.log("no va el else");
            // alert("no 200");
            alert('Elemento eliminado con id: ' + id_empleado);
            listar('');
        }
    };
    ajax.send(formdata);
}

// function crear() {
//     // console.log('entra');
//     //generar ajax
//     var form = document.getElementById('frm');
//     const formdata = new FormData(form);
//     // formdata.append('id',id);

//     const ajax = new XMLHttpRequest();
//     console.log(ajax);
//     ajax.open("POST", "crear.php");
//     // console.log(ajax);
//     ajax.onload = function() {
//         if (ajax.status === 200) {
//             // console.log(ajax.responseText);
//             if (ajax.responseText == "OK") {
//                 alert('Elemento creado con id: ');
//                 listar('');
//                 // console.log('hola');
//             }
//         } else {
//             alert('errorisimo');
//             // console.log('adios');
//         }
//     };
//     ajax.send(formdata);
// }