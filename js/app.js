$(document).ready(function(){ 
    var hash = window.location.hash;
    console.log(hash);

    if(hash === '#add-a-moment') {
        $(hash).modal('show');
    } else if(hash === '#success') {
        $(hash).show();
    }
});