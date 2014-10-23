$(document).ready(function() {loadClippings()});

function loadClippings() {
    $.ajax({
        url: window.location.origin + '/wordpress/api/rest/clipping.php?uid=' + uid
    }).done(function(response) {
        var responseObject = JSON.parse(response);
        for (var i in responseObject) {
            $.ajax({
                url: window.location.origin + '/wordpress/api/markup/markup-clipping_sidebar_row.php?id=' + responseObject[i].ID + '&name=' + responseObject[i].NAME + '&subtitle=' + responseObject[i].SUBTITLE
            }).done(function(markup) {
                $('#sidebar-list').prepend(markup);
            });
        }
    });
}
