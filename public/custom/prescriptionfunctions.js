/**
 * Created by bascr on 29-05-2017.
 */
$(document).ready(function() {

    $('#price').val(0);
    $('#total').val(0);
    $('#pay').val(0);
    // calculate the total
    $('.crystalTable').on('click', ':radio', function() {
        var frame_price = $('#price').val();
        total(frame_price);
    });

});


$(document).ready(function() {

    $('body').on('input', '#frame', function() {

        var input = $(this);

        var values = {
            'id' : input.val()
        };

        $.ajax({
            method: 'POST',
            url: '../get_frame_name',
            data: values,
            dataType: 'json',
            encode: true,
            success: function(data) {
                $('#frameName').val(data.name);

                if(data.price !== 0) {
                    $('#price').val(data.price);
                } else {
                    $('#price').val(0);
                }
            },
            complete: function (data) {
                var frame_price = $('#price').val();
                total(frame_price);
            },
            error: function () {

            }
        });

    });

});

function total(frame_price) {

    var checkedRadioButton = $('input:radio[name="crystals"]:checked');
    var currentRow = checkedRadioButton.closest('tr');
    var crystalPrice = parseInt(currentRow.find('td:eq(6)').text());
    var framePrice = parseInt(frame_price);

    var total = crystalPrice + framePrice;

    $('#total').val(total);

}

//-------------------------------- Validations for prescription register view ------------------------------------------

function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789+-.";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}


function soloNumeros2(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8";

    tecla_especial = false;
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function validaForm(){

    var aux = 0;
    var aux2 = 0;
    var exp = /^(\+|-)\d{1,2}[.](\d{2}$)/;
    /*>>>>>>>>>> valida ojo derecho lejos >>>>>>>>>>>>*/
    var far_r_s = document.getElementById("far_right_eye_sphere");
    if(far_r_s.value.length == 0){
        aux++;
        document.getElementById("far_right_eye_sphere").style.backgroundColor = 'white';
    }else{
        if( !exp.test(far_r_s.value)){
            aux2++;
            document.getElementById("far_right_eye_sphere").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_right_eye_sphere").style.backgroundColor = 'white';
        }
    }

    var far_r_c = document.getElementById("far_right_eye_cyl");
    if(far_r_c.value.length == 0){
        aux++;
        document.getElementById("far_right_eye_cyl").style.backgroundColor = 'white';
    }else{
        if( !exp.test(far_r_c.value)){
            aux2++;
            document.getElementById("far_right_eye_cyl").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_right_eye_cyl").style.backgroundColor = 'white';
        }
    }

    var far_r_a = document.getElementById("far_right_axis");
    if(far_r_a.value.length == 0){
        aux++;
        document.getElementById("far_right_axis").style.backgroundColor = 'white';
    }
    else{
        if(far_r_a.value > 180){
            aux2++;
            document.getElementById("far_right_axis").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_right_axis").style.backgroundColor = 'white';
        }
    }

    var far_r_p = document.getElementById("far_right_prism");
    if(far_r_p.value.length == 0){
        aux++;
    }

    var far_r_b = document.getElementById("far_right_base");
    if(far_r_b.value.length == 0){
        aux++;
    }

    var far_r_pd = document.getElementById("far_right_pd");
    if(far_r_pd.value.length == 0){
        aux++;
    }

    /*>>>>>>>>>> valida ojo izquierdo lejos >>>>>>>>>>>>*/

    var far_l_s = document.getElementById("far_left_eye_sphere");
    if(far_l_s.value.length == 0){
        aux++;
        document.getElementById("far_left_eye_sphere").style.backgroundColor = 'white';
    }else{
        if( !exp.test(far_l_s.value)){
            aux2++;
            document.getElementById("far_left_eye_sphere").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_left_eye_sphere").style.backgroundColor = 'white';
        }
    }

    var far_l_c = document.getElementById("far_left_eye_cyl");
    if(far_l_c.value.length == 0){
        aux++;
        document.getElementById("far_left_eye_cyl").style.backgroundColor = 'white';
    }else{
        if( !exp.test(far_l_c.value)){
            aux2++;
            document.getElementById("far_left_eye_cyl").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_left_eye_cyl").style.backgroundColor = 'white';
        }
    }

    var far_l_a = document.getElementById("far_left_axis");
    if(far_l_a.value.length == 0){
        aux++;
        document.getElementById("far_left_axis").style.backgroundColor = 'white';
    }else{
        if( far_l_a.value > 180){
            aux2++;
            document.getElementById("far_left_axis").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("far_left_axis").style.backgroundColor = 'white';
        }
    }

    var far_l_p = document.getElementById("far_left_prism");
    if(far_l_p.value.length == 0){
        aux++;
    }

    var far_l_b = document.getElementById("far_left_base");
    if(far_l_b.value.length == 0){
        aux++;
    }

    var far_l_pd = document.getElementById("far_left_pd");
    if(far_l_pd.value.length == 0){
        aux++;
    }

    /*>>>>>>>>>> valida ojo derecho cerca >>>>>>>>>>>>*/

    var n_r_s = document.getElementById("near_right_eye_sphere");
    if(n_r_s.value.length == 0){
        aux++;
        document.getElementById("near_right_eye_sphere").style.backgroundColor = 'white';
    }else{
        if( !exp.test(n_r_s.value)){
            aux2++;
            document.getElementById("near_right_eye_sphere").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_right_eye_sphere").style.backgroundColor = 'white';
        }
    }

    var n_r_c = document.getElementById("near_right_eye_cyl");
    if(n_r_c.value.length == 0){
        aux++;
        document.getElementById("near_right_eye_cyl").style.backgroundColor = 'white';
    }else{
        if( !exp.test(n_r_c.value)){
            aux2++;
            document.getElementById("near_right_eye_cyl").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_right_eye_cyl").style.backgroundColor = 'white';
        }
    }

    var n_r_a = document.getElementById("near_right_axis");
    if(n_r_a.value.length == 0){
        aux++;
        document.getElementById("near_right_axis").style.backgroundColor = 'white';
    }else{
        if(n_r_a.value > 180){
            aux2++;
            document.getElementById("near_right_axis").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_right_axis").style.backgroundColor = 'white';
        }
    }

    var n_r_p = document.getElementById("near_right_prism");
    if(n_r_p.value.length == 0){
        aux++;
    }

    var n_r_b = document.getElementById("near_right_base");
    if(n_r_b.value.length == 0){
        aux++;
    }

    var n_r_pd = document.getElementById("near_right_pd");
    if(n_r_pd.value.length == 0){
        aux++;
    }

    /*>>>>>>>>>> valida ojo izquiero cerca >>>>>>>>>>>>*/

    var n_l_s = document.getElementById("near_left_eye_sphere");
    if(n_l_s.value.length == 0){
        aux++;
        document.getElementById("near_left_eye_sphere").style.backgroundColor = 'white';
    }else{
        if( !exp.test(n_l_s.value)){
            aux2++;
            document.getElementById("near_left_eye_sphere").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_left_eye_sphere").style.backgroundColor = 'white';
        }
    }

    var n_l_c = document.getElementById("near_left_eye_cyl");
    if(n_l_c.value.length == 0){
        aux++;
        document.getElementById("near_left_eye_cyl").style.backgroundColor = 'white';
    }else{
        if( !exp.test(n_l_c.value)){
            aux2++;
            document.getElementById("near_left_eye_cyl").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_left_eye_cyl").style.backgroundColor = 'white';
        }
    }

    var n_l_a = document.getElementById("near_left_axis");
    if(n_l_a.value.length == 0){
        aux++;
        document.getElementById("near_left_axis").style.backgroundColor = 'white';
    }else{
        if(n_l_a.value > 180){
            aux2++;
            document.getElementById("near_left_axis").style.backgroundColor = 'yellow';
        }else{
            document.getElementById("near_left_axis").style.backgroundColor = 'white';
        }
    }

    var n_l_p = document.getElementById("near_left_prism");
    if(n_l_p.value.length == 0){
        aux++;
    }

    var n_l_b = document.getElementById("near_left_base");
    if(n_l_b.value.length == 0){
        aux++;
    }

    var n_l_pd = document.getElementById("near_left_pd");
    if(n_l_pd.value.length == 0){
        aux++;
    }

    if(aux >= 24){
        swal("Verifique en la receta", "Ingrese valores de dioptría", "warning");
        return false;
    }

    if(aux2 != 0){
        swal("Verifique en la receta", "Ingrese valores de dioptría validos", "warning");
        return false;
    }

    var frame = document.getElementById("frame").value;
    if(frame == "") {
        swal("Verifique en la receta", "Ingrese código de armazón", "warning");
        return false;
    }
    if(!frame.match(/^\d+/)) {
        swal("Verifique en la receta", "Ingrese un código válido de armazón", "warning");
        return false;
    }

    var pay = document.getElementById("pay").value;
    var total = document.getElementById("total").value;

    if(pay == "") {
        swal("Verifique en la receta", "Ingrese valor en campo abono.", "warning");
        return false;
    }
    if(pay < (total / 2)) {
        swal("Verifique en la receta", "El abono debe ser igual o mayor al 50%.", "warning");
        return false;
    }

}

