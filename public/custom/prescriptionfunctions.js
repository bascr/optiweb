/**
 * Created by bascr on 29-05-2017.
 */
$(document).ready(function() {

    $('#price').val(0);
    $('#total').val(0);
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
