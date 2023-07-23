$(document).ready(function () {
    $('#toggle-one').bootstrapToggle(
        {
            on: 'Да',
            off: 'Нет'
        }
    );
    $('#toggle-two').bootstrapToggle({
        on: 'Да',
        off: 'Нет'
    });

    $('#toggle-one').change(function() {
        let form = $('form[name="deleted"]');
        // form.submit();
        console.log($(this).prop("checked"));
        $.ajax({
            url: '/main/getWithDeleted',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {withDeleted: $(this).prop("checked")},     /* Параметры передаваемые в запросе. */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $('.products-list').html(data);            /* В переменной data содержится ответ от index.php. */
            }
        })
    })

    $('#toggle-two').change(function() {
        $.ajax({
            url: '/main/getOnlyDeleted',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {onlyDeleted: $(this).prop("checked")},     /* Параметры передаваемые в запросе. */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $('.products-list').html(data);            /* В переменной data содержится ответ от index.php. */
            }
        })
    })

    function getSortedProducts(field, sort) {
        $.ajax({
            url: '/main/getSortedProducts',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                field: field,
                sort: sort,
            },     /* Параметры передаваемые в запросе. */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $('.products-list').html(data);            /* В переменной data содержится ответ от index.php. */
            }
        })
    }

    $('.price-asc').on('click', function(e) {
        getSortedProducts('price', 'ASC');
        return false;
    });
    $('.price-desc').on('click', function(e) {
        getSortedProducts( 'price', 'DESC');
        return false;
    })
    $('.title-asc').on('click', function(e) {
        getSortedProducts('title', 'ASC');
        return false;
    })
    $('.title-desc').on('click', function(e) {
        getSortedProducts('title', 'DESC');
        return false;
    })
    $('.create-asc').on('click', function() {
        getSortedProducts('created_at', 'ASC');
        return false;
    })
    $('.create-desc').on('click', function() {
        getSortedProducts('created_at', 'DESC');
        return false;
    })
    $('.update-asc').on('click', function() {
        getSortedProducts('updated_at', 'ASC');
        return false;
    })
    $('.update-desc').on('click', function() {
        getSortedProducts('updated_at', 'DESC');
        return false;
    })
    $('.delete-asc').on('click', function() {
        getSortedProducts('deleted_at', 'ASC');
        return false;
    })
    $('.delete-desc').on('click', function() {
        getSortedProducts('deleted_at', 'DESC');
        return false;
    })

    $('input[name="search"]').on('input', function() {
        console.log($(this).val());
        $.ajax({
            url: '/main/search',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                word: $(this).val(),
            },     /* Параметры передаваемые в запросе. */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $('.products-list').html(data);            /* В переменной data содержится ответ от index.php. */
            }
        })
        return false;
    })
});