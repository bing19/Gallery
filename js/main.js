// $(document).ready(function() {
//     $('.grid-6 .img a').click(function(e) {
//         var toLoad = $(this).attr('href');
//         e.preventDefault();
//
//         $.ajax({
//             type: "GET",
//             url: toLoad, // Обработчик
//
//             cache: false,
//             beforeSend: function () {
//                 $('#big').html('Загружаю...'); // Изменяем надпись кнопки на "Загружаю..."
//             },
//
//             success: function(html) {
//                 data = $(html)[5].getElementsByTagName('img');
//                 $('#big').html(data);
//
//             }
//         }, false);
//
//
//
//
//
//     });
//
// });

$(document).ready(function() {
    let elems = document.querySelectorAll('.img a ');
    let container = document.getElementById('big');

    for (i = 0; i < elems.length; i++) {
        // console.log(typeof(elems[i]));
        elems[i].addEventListener('click', login);
    }

    function login (e) {
        let link = this.href;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', link, true);
        xhr.responseType = 'document';
        if (typeof elems[0] != undefined) {
            xhr.addEventListener('load', function () {
                let res = xhr.response;
                res = res.getElementsByTagName('img')[0];
                console.log(res);
                container.innerHTML = '';
                container.appendChild(res);
            });
            xhr.send();
        }


        e.preventDefault();
    }

    let img = document.querySelector('input[name="newimage"]'); // Выборка элемаента по аттрибуту методом querySelector
    img.setAttribute('name', 'oldimage');

    // for (i = 0; i < img.length; i++) {                       // Либо такой функцией как я написал, но она работает медленнее
    //     if(img[i].getAttribute('name') == 'newimage') {
    //         img = img[i];
    //     }
    // }

    console.log(img);

    // firstImg.addEventListener('mouseover', function () {
    //
    //         let xhr = new XMLHttpRequest();
    //         xhr.open('GET', 'image?file=1', true);
    //         console.log(xhr);
    //         xhr.addEventListener('load', function () {
    //          let res = xhr.response;
    //             console.log(res);
    //             $('#big').html(res);
    //         });
    //         xhr.send();
    });




// $(document).ready(function() {
//     $('#big').load('image?file=1');
//
//
//
// });
//
// let height = $('html').outerHeight();
// let windowIn = window.innerHeight;
// console.log(height);
// console.log(windowIn);