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