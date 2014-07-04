$(document).ready(function(){ 

    // Control hash for "Moment" Pages
    var hash = window.location.hash;
    console.log(hash);

    if(hash === '#add-a-moment') {
        $(hash).modal('show');
    } else if(hash === '#success') {
        $(hash).show();
    }

    // Read more on the page for comments
    var showChar = 200;
    var ellipsestext = "...";
    var moretext = "Read More";
    var lesstext = "Show Less";
    $('.moment').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
            $(this).find('.moreellipses' && '.morecontent > span').hide();
        }
     });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });

    // Homepage rotation
    var timer = 5000;
    function homepageAnimate(){
        var count = $('.quote-container .quote').length,
            number = $('.quote-container .quote.active').attr('data-count');
    
        if((count - 1) == number){
            $('.quote-container .quote.active').removeClass('active');
            $('.quote-container .quote:first-child').addClass('active');
        } else {
            $('.quote-container .quote.active').removeClass('active').next('.quote').addClass('active');
        }
        setTimeout(homepageAnimate, timer);
    }
    setTimeout(homepageAnimate, timer);

});