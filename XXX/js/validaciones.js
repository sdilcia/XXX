function validar(){
    var username, contrasenia, expresion;
    username = document.getElementById("username").value;
    contrasenia = document.getElementById("contrasenia").value;

    if (username === "" || contrasenia === "" ){
        alert ("Por favor llena todos los campos");
        return false;
    }
}