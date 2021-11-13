$(document).ready(function(e){
    $win = $(window);
    $navbar = $('#header');
    $toggle = $('.toggle-button');
    var width = $navbar.width();
    toggle_onclik($win, $navbar, width);

    $win.resize(function(){
        toggle_onclik($win, $navbar, width);
    });

    $toggle.click(function(e){
        $navbar.toggleClass('toggle-left')
    });
});

function toggle_onclik($win, $navbar, width){
    if($win.width() <= 740){
        $navbar.css({left: `-${width}px`})
        document.getElementById('menu').style.display = 'block';
    }else{
        $navbar.css({left: '0px'});
        document.getElementById('menu').style.display = 'none';
    }
}