$(document).ready(function() {
    $('.grid-6 .img a').click(function(e) {
        var toLoad = $(this).attr('href');
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: toLoad, // Обработчик

            cache: false,
            beforeSend: function () {
                $('#big').html('Загружаю...'); // Изменяем надпись кнопки на "Загружаю..."
            },

            success: function(html) {
                data = $(html)[5].getElementsByTagName('img');
                $('#big').html(data);

            }
        }, false);





    });

});


// $.ajax({
//     url: toLoad,
//     cache: false,
//     beforeSend: function () {
//         $('#big').html('Please wait...');
//     },
//     success: function(html) { $('#big').html(html); }
// });