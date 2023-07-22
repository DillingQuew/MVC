$(document).ready(function () {
    $(function() {
        $('#toggle-one').bootstrapToggle(
            {
                on: 'Да',
                off: 'Нет'
            }
        );
    })
    $('#toggle-one').change(function() {
        let form = $('form[name="deleted"]');
        form.submit();
        // $.ajax({
        //     url: '/',         /* Куда пойдет запрос */
        //     method: 'get',             /* Метод передачи (post или get) */
        //     dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        //     data: form.serialize(),     /* Параметры передаваемые в запросе. */
        //     success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
        //         console.log(data);            /* В переменной data содержится ответ от index.php. */
        //     }
        // })
    })
});