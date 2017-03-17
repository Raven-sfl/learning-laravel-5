$('.del_image').click(function () {
    div = $(this).parent(); //div, который содержить и картинку и кнопку
    src = $(this).prev().attr('src'); //ссылка на картинку

    $.ajax({
        url: '/del_image',
        method: 'POST',
        data: {src: src},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            div.remove(); //если все прошло без ошибок то удаляем div с картинкой и кнопкой
        },
        error: function (msg) {
            console.log(msg);
        }
    });
})