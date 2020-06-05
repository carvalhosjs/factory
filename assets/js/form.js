/*
    * AJAX FORM cuidadoao colocar
    * verifica se a class do form existe ajax_off para deslogar as requisisicoes por esse plugin
    */
$("form:not('.ajax_off')").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var load = $(".ajax_load");
    var flashClass = "ajax_response";
    var flashClassBox = "ajax_response_box";
    var flash = $("." + flashClass);
    var flashbox = $("." + flashClassBox);

    form.ajaxSubmit({
        url: form.attr("action"),
        type: "POST",
        dataType: "json",
        beforeSend: function () {
            load.fadeIn(200).css("display", "flex");
        },
        uploadProgress: function (event, position, total, completed) {
            var loaded = completed;
            var load_title = $(".ajax_load_box_title");
            load_title.text("Salvado (" + loaded + "%)");

            form.find("input[type='file']").val(null);
            if (completed >= 100) {
                load_title.text("Aguarde, carregando...");
            }
        },
        success: function (response) {
            //redirect
            if (response.redirect) {
                window.location.href = response.redirect;
            } else {
                load.fadeOut(200);
            }

            //reload
            if (response.reload) {
                window.location.reload();
            } else {
                load.fadeOut(200);
            }

            //message
            if (response.message) {
                if (flash.length) {
                    flashbox.fadeIn(100);
                    flash.html(response.message).fadeIn(100).effect("bounce", 300);
                } else {
                    form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>")
                        .find("." + flashClass).effect("bounce", 300);
                }
            } else {
                flash.fadeOut(100);
            }
        },
        complete: function () {
            console.log("23");
            if (form.data("reset") === true) {
                form.trigger("reset");
            }
        },
        error: function () {
            var message = "<div class='message error icon-warning'>Desculpe mas não foi possível processar a requisição. Favor tente novamente!</div>";

            if (flash.length) {
                flash.html(message).fadeIn(100).effect("bounce", 300);
            } else {
                form.prepend("<div class='" + flashClass + "'>" + message + "</div>")
                    .find("." + flashClass).effect("bounce", 300);
            }

            load.fadeOut();
        }
    });
});