setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 2500); // <-- time in milliseconds



$(document).ready(function () {
    $(window).scroll(function () {
        if ($(document).scrollTop() > 450) {
            $("#menu").css("background-color", "rgb(0, 0, 0)");
        } else {
            $("#menu").css("background-color", "rgb(0, 0, 0, .6)");
        }
    });
});
