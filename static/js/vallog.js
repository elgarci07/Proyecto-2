var perror = document.getElementById(email);
//console.log(perror['value']);

function validarEmail() {
    console.log(perror.value)
    console.log("entra")
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)) {
        alert("La dirección de email " + valor + " es correcta.");
    } else {
        alert("La dirección de email es incorrecta.");
        // var perror = document.getElementById(emailp).innerText("error");
    }
}