$(function() {
    let currencyInput = document.getElementById('currency');
    let currentCurrency = currencyInput.value;
    let minAmount = document.getElementById('amount_min');
    let maxAmount = document.getElementById('amount_max')

    currencyInput.addEventListener('change', function (e){
        currentCurrency = e.target.value;
        $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + ` ${currentCurrency} - ` +
            $( "#slider-range" ).slider( "values", 1 ) + ` ${currentCurrency} ` );
    });
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 10000,
    step: 100
    ,
    values: [ minAmount.value ?? 0, maxAmount.value ?? 10000 ],
    slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[0] + ` ${currentCurrency} - ` +
            ui.values[1] + ` ${currentCurrency} ` );

        minAmount.value = ui.values[0];
        maxAmount.value = ui.values[1];
    }
  });
    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + ` ${currentCurrency} - ` +
        $( "#slider-range" ).slider( "values", 1 ) + ` ${currentCurrency} ` );
});
