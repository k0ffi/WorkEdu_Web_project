$(document).ready(function() {
    var seconds = 3;
    var countdown = setInterval(function() {
        $('#countdown').text(seconds);
        seconds--;
        if (seconds < 0) {
            clearInterval(countdown);
            var rootUrl = $('body').data('root'); 
            var loginUrl = rootUrl + 'login'; 
            window.location.href = loginUrl;
        }
    }, 1000);
});