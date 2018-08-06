/*load sidebar*/
var servicePage = jQuery('.page-services');
if (servicePage.length == 1) {
    var generalContainer = jQuery('.page-services .content-container');
    var sidebarContainer = jQuery('aside#secondary');
    var sidebar = jQuery('aside#secondary .sidebar-content');
    var aplied = false;
    sidebarContainer.height(generalContainer.height());
    jQuery(window).scroll(function (e) {
        var point = sidebarContainer[0].getBoundingClientRect().top;
        if (point < 30) { // top limit
            sidebar.css({
                'position': 'fixed',
                'top': '30px'
            });
        } else {
            sidebar.css({
                'position': 'relative',
                'top': '0',
                'width': '100%'
            });
        }
        console.log(point);
    });
}