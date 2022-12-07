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
                Swal.fire(
                    '¡Reservado!',
                    'Tu reserva a sido creada con exito!',
                    'success')
                listar('');
                // console.log('hola');
            }
        } else {
            Swal.fire(
                    '¡Algo a salido mal!',
                    'Comprueba que todos los campos sean correctos!',
                    'error')
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