/*Cart*/

$('body').on('click', '.add-to-cart-link', function(e){
   e.preventDefault();
   var id = $(this).data('id'),
       qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
       mod = $('.available select').val();
   $.ajax({
       url: '/cart/add',
       data: {id: id, qty: qty, mod: mod},
       type: 'GET',
       success: function (res) {
            showCart(res);
       },
       error: function () {
           alert('Ошибка! Поробуте позже');
       }
   });
});

function showCart(cart){
    console.log(cart);
}

/*Cart*/






$('#currency').change(function(){
    window.location = 'currency/change?curr=' + $(this).val()
    console.log($(this).val())
});

$('.available select').on('change', function(){
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').text(symbolLeft + Math.round(price) + symbolRight);
    }else{
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }
});