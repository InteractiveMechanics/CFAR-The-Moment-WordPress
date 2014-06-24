$(document).ready(function(){ 
    $('.carousel').carousel({
        interval: 6000
    });

    $('#show-form').on('click', function() {
        $(this).hide();
        $(this).parent().next().removeClass('hidden');
    });
});