$('.submit-btn').on('click', function () {
    $.ajax({
        url: 'https://yodizschool.ru/buyPage/receive/html.php',
        method: 'GET',
        success: function(data){
            $('body').append('<div id="form"></div>')
            $('#form').html(data)
            $('#form form').submit()
        }
    });
})