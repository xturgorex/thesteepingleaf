jQuery(function ($) {

var counter = 1;

// set the + functionality
$('.variations_button .plus').click( function(){var counter = $('.variations_button .input-text.qty.text').val();$('.variations_button .input-text.qty.text').val( ++counter )} );
// set the - functionality
$('.variations_button .minus').click( function(){var counter = $('.variations_button .input-text.qty.text').val();$('.variations_button .input-text.qty.text').val( (counter-1<1)?counter:--counter )} );
// initialize display
$('.variations_button .input-text.qty.text').val( counter );


});