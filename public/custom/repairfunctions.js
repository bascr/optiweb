/**
 * Created by Rodrigo on 11-07-17.
 */
$(document).ready(function() {

    $('#price').val(0);
    $('#total').val(0);
    $('#pay').val(0);
    $('#totales').val(0);
    $('#pay').prop("disabled", true);
    // calculate the total
    $('#price').on('input',function() {
        calculate_subtotal();
        total();

    });

});


$(document).ready(function() {


    // añade nuevos campos para añadir un articulo a la venta
    $('.addButton').click(function() {
        $('#articles').append(
            '<div class="">' +
            '<div class="col-md-2">' +
            '<label for="codArticle" class="control-label" >Cód. Artículo</label>' +
            '<input class="form-control codArticle" name="codArticle[]" type="text" onkeypress="return soloNumeros(event)" style="min-width:80px;"/>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<label for="article" class="control-label" >Artículo</label>' +
            '<input class="form-control article" name="article[]" type="text" style=" background-color:#fff; min-width:150px;" readonly/>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="quantity" class="control-label" >Cantidad</label>' +
            '<input type="number" class="form-control quantity" name="quantity[]" onkeypress="return soloNumeros(event)" style="max-width:100px;" min="1" value="1"/>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="price" class="control-label" >Precio Unitario</label>' +
            '<input type="text" class="form-control price" name="price[]" onkeypress="return soloNumeros(event)" style="background-color:#fff; max-width:100px;" value="0" readonly/>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<input class="btn btn-warning deleteButton" type="button" value="Eliminar artículo" style="margin-top:25px;"/>' +
            '</div>' +
            '<div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>' +
            '</div>');
    });


    $('body').on('input', '.codArticle', function() {

        var input = $(this);

        var values = {
            'id' : input.val()
        };

        $.ajax({
            method: 'POST',
            url: '../get_article_name',
            data: values,
            dataType: 'json',
            encode: true,
        }).done(function(data) {

            var thisIndex = input.index('input:text');
            var next = thisIndex + 1;
            $('input:text').eq(next).val(data.nameArticle);

            var thisIndex = input.index('input:text');
            var next = thisIndex + 2;
            $('input:text').eq(next).val(data.price);

            calculate_subtotal();
            total();

        });
    });
 });

// ejecuta la funcion calcular total cuando se modifica el DOM al cambiar los textos u otro estado
$('body').on('change keyup DOMSubtreeModified', '#articles', function(event) {

    calculate_subtotal();
    total();

});


// elimina un articulo y luego ejecuta la funcion calcular total
$('body').on('click', '.deleteButton', function () {

    $(this).parent().parent().remove();

    calculate_subtotal();
    total();

});

//bloquea el abono si es reparacion en el local
$('body').on('change keyup DOMSubtreeModified', '#workshop', function () {

    var workshop =  parseInt($('#workshop').val());
    if(workshop != 1){
        $('#pay').prop("disabled", false);
    }else{
        $('#pay').prop("disabled", true);
        $('#pay').val(0);
    }

});

// calcula el valor total de las ventas de artículos
function calculate_subtotal() {
    var input_price = $('.price').map(function() {
        return $(this).val();
    }).get();

    var input_quantity = $('.quantity').map(function() {
        return $(this).val();
    }).get();

    $total = 0;

    for(var i = 0; i < input_price.length; i++) {

        $total += input_price[i] * input_quantity[i];

    }

    $('#total').val($total);
}


function total() {

    var price = $('#price').val();

    if(price == '') {
        price = parseInt(0);
    }

    var totales = parseInt($('#total').val()) + parseInt(price);
    $('#totales').val(totales);

}

// valida formulario

function validaForm() {

    var message;

    var taller = document.getElementById("workshop");
    if(parseInt(taller.value) == 0){
        message = parseInt(taller.value);
    }

    var obs = document.getElementById("observacion");
    if(obs.value.length == ""){
        message = 1;
    }

    var price = document.getElementById("price");
    if(parseInt(price.value) == 0 || price.value == ''){
        message = 2;
    }

    var pay = document.getElementById("pay");
    if(parseInt(pay.value) == 0 && parseInt(taller.value) > 1){
        message = 3;
    }

    var totales = document.getElementById("totales");
    var div = parseInt(totales.value)/2;
    if(parseInt(pay.value) != 0 && parseInt(taller.value) > 1){
        if(parseInt(pay.value) < div){
            message = 4;
        }
    }

    if(parseInt(pay.value) > parseInt(totales.value)){
        message = 5;
    }


    switch (message){
        case 0: swal("No ha seleccionado", "un taller", "warning");
            return false;
        case 1: swal("Falta ingresar observacion", "", "warning");
            return false;
        case 2: swal("Ingrese el valor de", "la mano de obra", "warning");
            return false;
        case 3: swal("Debe ingresar valor", "del abono", "warning");
            return false;
        case 4: swal("El valor del abono debe ser", "igual o mayor al 50%", "warning");
            return false;
        case 5: swal("El valor del abono no puede ser", "mayor al valor total", "warning");
            return false;
    }
}