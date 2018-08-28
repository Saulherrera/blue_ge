/*load sidebar*/
var servicePage = jQuery('.page-services');
if (servicePage.length == 1) {
    var generalContainer = jQuery('.page-services .content-container');
    var sidebarContainer = jQuery('aside#secondary');
    var sidebar = jQuery('aside#secondary .sidebar-content');
    var aplied = false;
    // sidebarContainer.height(generalContainer.height());
    jQuery(window).scroll(function (e) {
        var point = sidebarContainer[0].getBoundingClientRect().top;
        var guestWidth = null;
        if (point < 30) { // top limit
            sidebar.css({
                'position': 'fixed',
                'top': '30px'
            });
            guestWidth = sidebarContainer.width();
            if (guestWidth) {
                sidebar.css({'width': guestWidth});
            }
        } else {
            sidebar.css({
                'position': 'relative',
                'top': '0',
                'width': '100%'
            });
        }
    });

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

    function makesvg(percentage, inner_text="", clases) {
        var abs_percentage = Math.abs(percentage - 10).toString();
        var percentage_str = percentage.toString();
        var classes = ""

        if (percentage < 0) {
            classes = "danger-stroke circle-chart__circle--negative";
        } else if (percentage > 0 && percentage <= 30) {
            classes = "warning-stroke";
        } else {
            classes = "success-stroke";
        }

        var svg = '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">'
            + '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="14.9" />'
            + '<circle class="circle-chart__circle ' + classes + ' ' + clases + '"'
            + 'stroke-dasharray="' + abs_percentage + ',100"    cx="16.9" cy="16.9" r="14.9" />'
            + '<g class="circle-chart__info">'
            + '   <text class="circle-chart__percent" x="17.9" y="17">' + (percentage_str) + '%</text>';
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
                this.each(function () {
                    var percentage = $(this).data("percentage");
                    var inner_text = $(this).text();
                    $(this).html(makesvg(percentage, inner_text, clases));
                });
                return this;
            };

        }(jQuery));
    }
}
