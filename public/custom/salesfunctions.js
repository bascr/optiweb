/**
 * Created by bascr on 28-04-2017.
 */
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

    // elimina un articulo y luego ejecuta la funcion calcular total
    $('body').on('click', '.deleteButton', function () {

        $(this).parent().parent().remove();

        calculate_total();

    });


    // carga a traves de ajax lel nombre y el precio del articulo y carga el total
    $('body').on('input', '.codArticle', function(event) {

        var input = $(this);

        var values = {
            'id' : input.val()
        };

        $.ajax({
            method: "POST",
            url: "../get_article_name",
            data : values,
            dataType: 'json',
            encode: true

        }).done(function(data) {

            var thisIndex = input.index('input:text');
            var next = thisIndex + 1;
            $('input:text').eq(next).val(data.nameArticle);

            var thisIndex = input.index('input:text');
            var next = thisIndex + 2;
            $('input:text').eq(next).val(data.price);

            calculate_total();
        });



    });

    // ejecuta la funcion calcular total cuando se modifica el DOM al cambiar los textos u otro estado
    $('body').on('change keyup DOMSubtreeModified', '#articles', function(event) {

       calculate_total();

    });

    // calcula el valor total de las ventas de artículos
    function calculate_total() {
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

    // validar que los campos de venta sean válidos
    $('body').on('click', '#send', function(){

        // validar que no se envien campos Cod. Articulo vacíos
        var input_codArticle = $('.codArticle').map(function() {
            return $(this).val();
        }).get();

        for(var i = 0; i < input_codArticle.length; i++) {

            if(input_codArticle[i] == '') {
                swal('Verifique la venta', 'Verifique que todos los campos de \"Cod. Articulo\" tengan algún valor, si no elimínelo de la venta.', 'warning');
                return false;
            }
        }

        // validar que los productos ingresados correspondan con los registros
        var input_article = $('.article').map(function() {
            return $(this).val();
        }).get();

        for(var i = 0; i < input_article.length; i++) {

            if(input_article[i] == 'Articulo no encontrado, o sin stock') {
                swal('Verifique la venta', 'Si en algún campo \"Artículo\" aparece: \"Articulo no encontrado o sin stock\", verifique que los códigos ingresados correspondan con un artículo registrado o verifique el stock.', 'warning');
                return false;
            }
        }

    });




});

$(document).ready(function() {

    $sum = 0;
    $('.subtotal').map(function() {
        $sum += parseInt($(this).val());
    });

    $('#totalsaletoday').val($sum);

});