
function formatCurrency(value) {
    return "₦" +Number(value).toLocaleString('en');
}

$(document).ready(function() {
   
    $('span.price').each(function() {
      var price = $(this).text();
      $(this).html(formatCurrency(price));

    });
    
  //$('span.price').html(formatCurrency(price));
});