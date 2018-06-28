
$(document).ready(function () {

    $("#form-registro").submit(function (e) {
        e.preventDefault();
        var form = $(this);
confirm('hola mundo')
        $.ajax({
            method: form.attr("method"),
            url: form.attr("action"),
            data: form.serialize()
            , success: function (msg) {
                console.log(msg.responseJSON())
                console.log('exito');
                location.reload();
                $('#myModal').modal('hide');
            },
            error: function (er) {
                console.log(er.responseJSON());
                $('#myModal').modal('show');
            }
        });
        return false;
    });

     $('#logining').click(function (event)
     {
         event.preventDefault();
         var url = $(this);
         console.log('llego',url.attr('href'));
         $.ajax({
             method: "get",
             url: url.attr('href')
             , success: function (msg) {
                console.log(msg);
                 $('#myModal').modal('hide');
             },
             error: function (er) {

             }
         });
         return false;
         //here you can also do all sort of things
     });


    $("#form-login").on(function (e) {
        e.preventDefault();
        var form = $(this);
        confirm('hola mundo')
        $.ajax({
            method: form.attr("method"),
            url: form.attr("action"),
            data: form.serialize()
            , success: function (msg) {
                console.log(msg.responseJSON())
                console.log('exito');
                location.reload();
                $('#myModal').modal('hide');
            },
            error: function (er) {
                console.log(er.responseJSON());
                $('#myModal').modal('show');
            }
        });
        return false;
    });


})