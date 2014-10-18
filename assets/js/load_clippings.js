$(document).ready(function() {
    $.ajax({
        url: window.location.origin + '/api/rest/clipping.php?uid=1'
    }).done(function(response) {
        var responseObject = JSON.parse(response);
        for (var i in responseObject) {
            $.ajax({
                url: window.location.origin + '/api/markup/markup-clipping_sidebar_row.php?id=' + responseObject[i].ID + '&name=' + responseObject[i].NAME + '&subtitle=' + responseObject[i].SUBTITLE
            }).done(function(markup) {
                $('#sidebar-list').prepend(markup);
                var j;
            });
        }
    });
})