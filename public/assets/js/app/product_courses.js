$(document).ready(function(){
    // $('#price').keyup(function() { // # = id
    $('#price').on('keyup', function() { // # = id
        salesPrice();
    });

    $('#discount').on('change', function() {
        salesPrice();
    });

    $('#image_ads').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

});

function salesPrice() {
    var discount = $('#discount').val();
    var price = parseInt($('#price').val());

    if(!isNaN(price)) {
        if(discount == '' || discount == 1) {
            $('#sales_price').val(price);
        } else {
            discount_tag = $('#discount option:selected').text();
            discount_split = discount_tag.split('-');
            discount_value = $.trim(discount_split[1]).split(' ');

            if(discount_value[1] == 'rupiah') {
                sales_price = price - discount_value[0];
                $('#sales_price').val(sales_price);
            } else if (discount_value[1] == '%') {
                sales_price = price - (price*discount_value[0]/100);
                $('#sales_price').val(sales_price);
            }
        }
    }

}
