/**
 * Created by bascr on 28-04-2017.
 */
$(document).ready(function() {

    $('.addButton').click(function() {
        $('#articles').append('<div id="articles">' +
            '<div class="form-group">' +
                '<label class="col-md-2 control-label">Cód. Artículo</label>' +
                '<div class="col-md-2">' +
                    '<input class="form-control codArticle" name="codArticle" type="text" onkeypress="return soloNumeros(event)" style="max-width:100px;"/>' +
                '</div>' +
                    '<label for="article" class="col-md-1 control-label" >Artículo</label>' +
                '<div class="col-md-3">' +
                    '<input class="form-control article" name="article" type="text" style="max-width:200px;" readonly/>' +
                '</div>' +
                    '<label for="quantity" class="col-md-1 control-label" >Cantidad</label>' +
                '<div class="col-md-2">' +
                    '<input type="number" class="form-control" name="quantity" onkeypress="return soloNumeros(event)" style="max-width:100px;" min="1" value="1"/>' +
                '</div>' +
                '<div class="">' +
                    '<input class="btn btn-warning deleteButton" type="button" value="Eliminar"/>' +
                '</div>' +
                '<div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>' +
                '</div>' +
            '</div>');
    });

    $('body').on('click', '.deleteButton', function () {
        $(this).parent().parent().remove();
    });

    $('body').on('keyup', '.codArticle', function(event) {

        var input = $(this);

        var values = {
            'id' : input.val()
        };

        $.ajax({
            method: "POST",
            url: "/get_article_name",
            data : values,
            dataType: 'json',
            encode: true

        }).done(function(data) {

            var thisIndex = input.index('input:text');
            var next = thisIndex + 1;
            $('input:text').eq(next).val(data.nameArticle);

        });

    });


});