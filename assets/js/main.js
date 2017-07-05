

//activando los tooltips
$('.hastip').tooltipsy({
    offset: [0, -10],
    show: function (e, $el) {
        $el.css({
            'left': parseInt($el[0].style.left.replace(/[a-z]/g, '')) - 50 + 'px',
            'opacity': '0.0',
            'display': 'block'
        }).animate({
            'left': parseInt($el[0].style.left.replace(/[a-z]/g, '')) + 50 + 'px',
            'opacity': '1.0'
        }, 300);
    },
    hide: function (e, $el) {
        $el.slideUp(100);
    },
    css: {
        'padding': '2px 10px',
        'max-width': '200px',
        'color': '#111',
        'background-color': '#fefefe',
        'border': '1px solid #ccc',
        '-moz-box-shadow': '0 0 5px rgba(0, 0, 0, .5)',
        '-webkit-box-shadow': '0 0 5px rgba(0, 0, 0, .5)',
        'box-shadow': '0 0 5px rgba(0, 0, 0, .5)',
        'text-shadow': 'none'
    }
});

$(document).ready(function(){
    $('.table').dataTable();
});
