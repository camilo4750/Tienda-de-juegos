window.sr = ScrollReveal();
    sr.reveal(".effect1", {
        duration: 2000,
        origin: 'top',
        distance: '-100px'
    });

    let locationPrincipal = window.pageYOffset;
    window.onscroll = function() {
        let nowLocation = window.pageYOffset;
        if(locationPrincipal >= nowLocation) {
            document.getElementById('menu').style.top = '0';
        } else {
            document.getElementById('menu').style.top = '-100px';
        }
        locationPrincipal = nowLocation
    }

setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 2500); // <-- time in milliseconds
