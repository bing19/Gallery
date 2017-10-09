$(document).ready(function() {
    $('.grid-6 .img a').click(function() {
        var toLoad = $(this).attr('href');

        $.ajax({
            url: toLoad,
            cache: false,
            beforeSend: function () {
                $('#big').html('Please wait...');
            },
            success: function(html) { $('#big').html(html); }
        });

        break;

    });

});