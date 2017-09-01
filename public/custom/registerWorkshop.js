/**
 * Created by Rodrigo on 14-07-17.
 */
function validaForm() {

    var name = document.getElementById('name');
    var address = document.getElementById('address');
    var district = document.getElementById('district');
    var phone = document.getElementById('phone');
    var email = document.getElementById('email');
    var message = 0;

    if(email.value == ""){
        message = 5;
    }

    if(phone.value == ""){
        message = 4;
    }
    if(district.value == 0){
        message = 3;
    }
    if(address.value == 0){
        message = 2;
    }
    if(name.value == ""){
        message = 1;
    }


    switch (message){
        case 1: swal("Debe ingresar el nombre", "del taller", "warning");
            return false;
        case 2: swal("Debe ingresar la dirección", "del taller", "warning");
            return false;
        case 3: swal("Debe seleccionar", "una comuna", "warning");
            return false;
        case 4: swal("Debe ingresar el teléfono", "del taller", "warning");
            return false;
        case 5: swal("Debe ingresar un correo", "electrónico", "warning");
            return false;
    }

}