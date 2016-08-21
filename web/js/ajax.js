function ajax(event) {
    event.preventDefault();

    var $page = event.target.id;
    $.ajax({
            type: "POST",
            dataType: 'html',
            url: Routing.generate('daily_show', { page: $page }),
            async: true
        })
        .done(function (response) {
            var template = response;
            $('main').html(template);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert('Error : ' + errorThrown);
        });
}
