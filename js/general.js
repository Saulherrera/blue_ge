/*load sidebar*/
var servicePage = jQuery('.page-services');
if (servicePage.length === 1) {
    var generalContainer = jQuery('.page-services .content-container');
    var sidebarContainer = jQuery('aside#secondary');
    var footerContainer = jQuery('footer#footer');
    var sidebar = jQuery('aside#secondary .sidebar-content');
    var aplied = false;


    jQuery(window).on('scroll', sidebarFixed);
    sidebarFixed();

    function sidebarFixed(callback) {
        callback = typeof callback !== 'undefined' ? callback : true;
        var point = sidebarContainer[0].getBoundingClientRect().top;
        var point_bottom = footerContainer[0].getBoundingClientRect().top;
        var point_cnt = generalContainer[0].getBoundingClientRect().bottom;
        var point_cnt_i = generalContainer[0].getBoundingClientRect().top;
        var guestWidth = null;
        var infLimit = 581;
        if (point < 30) { // top limit
            if (point_cnt > infLimit) {
                sidebar.animate({
                    'top': (Math.abs(point_cnt_i) + 30) + 'px'
                }, 0);
                guestWidth = sidebarContainer.width();
                if (guestWidth) {
                    sidebar.css({'width': guestWidth});
                }
            }
        } else {
            sidebar.css({
                'position': 'relative',
                'top': '0',
                'width': '100%'
            });
        }
        if (callback) {
            setTimeout(sidebarFixed(false), 1000);
        }
    }

    var charts = jQuery('#ctm-charts-ge');
    if (charts.length == 1) {
        createCircle('');
        var chart = jQuery('.circlechart');
        chart.circlechart();
        var onetime = false;
        jQuery(window).on('ready, scroll', function (e) {
            var p = isPoint();
            if (p) {
                if (!onetime) {
                    createCircle('circle-chart__circle_animation');
                    chart.circlechart();
                    onetime = true;
                }
            }
        });

        function isPoint() {
            var chart = jQuery('.circlechart');
            var out = false;
            var point = chart[0].getBoundingClientRect().top;
            if (point <= 400) {
                out = true;
            }
            return out;
        }
    }
}


function createCircle(clases) {
    if (clases != '') {
        jQuery('.circlechart').html();
    }
    start();

    function makesvg(percentage, inner_text, clases, times) {
        inner_text = typeof inner_text !== 'undefined' ? inner_text : "";
        switch (times) {
            case 0:
                // grad = "redyellow";
                grad = "blue";
                // grad = "green";
                break;
            case 1:
                grad = "blue";
                break;
            case 2:
                grad = "blue";
                break;
            default:
                grad = "blue";
                // grad = "redyellow";
                break;
        }
        timeSVG++;
        var abs_percentage = Math.abs(percentage - 10).toString();
        var percentage_str = percentage.toString();
        var classes = "";

        if (percentage < 0) {
            classes = "danger-stroke circle-chart__circle--negative";
        } else if (percentage > 0 && percentage <= 30) {
            classes = "warning-stroke";
        } else {
            classes = "success-stroke";
        }

        var svg = '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><defs>' +
            '    <linearGradient id="gradient_redyellow" x1="0%" y1="0%" x2="0%" y2="100%">' +
            '      <stop offset="0%" stop-color="#132a3c" />' +
            '      <stop offset="30%" stop-color="#132a3c" />' +
            '      <stop offset="80%" stop-color="#132a3c" />' +
            '      <stop offset="100%" stop-color="#132a3c" />' +
            '    </linearGradient>' + '    <linearGradient id="gradient_blue" x1="0%" y1="0%" x2="0%" y2="100%">' +
            '      <stop offset="00%" stop-color="#132a3c" />' +
            // '      <stop offset="50%" stop-color="#132a3c" />' +
            // '      <stop offset="90%" stop-color="#132a3c" />' +
            '      <stop offset="60%" stop-color="#132a3c" />' +
            '      <stop offset="70%" stop-color="#132a3c" />' +
            '      <stop offset="80%" stop-color="#132a3c" />' +
            '      <stop offset="90%" stop-color="#132a3c" />' +
            '      <stop offset="100%" stop-color="#132a3c" />' +
            '    </linearGradient>' + '    <linearGradient id="gradient_green" x1="0%" y1="0%" x2="0%" y2="100%">' +
            '      <stop offset="0%" stop-color="#132a3c" />' +
            '      <stop offset="30%" stop-color="#132a3c" />' +
            '      <stop offset="90%" stop-color="#132a3c" />' +
            '      <stop offset="100%" stop-color="#132a3c" />' +
            '    </linearGradient>' +
            '  </defs>'
            + '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="14.9" />'
            + '<circle class="circle-chart__circle ' + classes + ' ' + clases + '"'
            + 'stroke-dasharray="' + abs_percentage + ',100"    cx="16.9" cy="16.9" r="14.9" stroke="url(#gradient_' + grad + ')"/>'
            + '<g class="circle-chart__info">'
            + '   <text class="circle-chart__percent" x="17.9" y="14">' + (percentage_str) + '%</text>';
        if (clases == '') {
            if (inner_text) {
                svg += '<text class="circle-chart__subline" x="16.91549431" y="22">' + inner_text + '</text>'
            }
        }

        svg += ' </g></svg>';

        return svg
    }

    function start() {
        (function ($) {

            $.fn.circlechart = function () {
                timeSVG = 0;
                this.each(function () {
                    var percentage = $(this).data("percentage");
                    var inner_text = $(this).text();
                    $(this).html(makesvg(percentage, inner_text, clases, timeSVG));
                });
                return this;
            };

        }(jQuery));
    }
}

var fixWidth = 10; // 4 imagenes - (10 + 10 + 10 margin images)
function slides(dir) {
    var ele = $('.carousel-inner');
    var container = $('#carousel');
    var containerWidth = container.width() + fixWidth;
    var current = Math.abs(parseInt(ele.css('left')));
    var currentNatural = parseInt(ele.css('left'));
    var items = ele.find('.item').length;
    var translationMargin = 10;
    var translation = Math.abs(parseInt($($('.carousel-inner').find('.item')[0]).css('width')));
    translation += translationMargin;
    //
    if (dir == 'right') {
        var leftTotal = (containerWidth) - (translation * items);
        if (currentNatural != leftTotal) {
            ele.animate({'left': '-=' + translation}, 200);
        }
    } else if (dir == 'left') {
        if (current != 0) {
            ele.animate({'left': '+=' + translation}, 200);
        }
    }
}