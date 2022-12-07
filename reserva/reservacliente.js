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
            } else if (ajax.responseText == "NOOK") {
                console.log(ajax.responseText);
                Swal.fire(
                    '¡Algo a salido mal!',
                    'No se pueden crear reservas para fechas anteriores al dia de hoy',
                    'error')
                listar('');
                // console.log('adios');
            } else if (ajax.responseText == "YAEXISTE") {
                console.log(ajax.responseText);
                Swal.fire(
                    '¡Algo a salido mal!',
                    'Ya existe una reserva en esta mesa para esta hora en ese mismo dia.',
                    'error')
                listar('');
            }

        } else {
            Swal.fire(
                '¡Algo a salido mal!',
                'Arregla esto marica que algo va mal',
                'error')
        }
    };
    ajax.send(formdata);
    // form.reset();
}


crearreserva.addEventListener("submit", (event) => {
    event.preventDefault();
    crear();
});