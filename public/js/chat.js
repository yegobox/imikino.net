$(".kapat").click(function() {
    var durum = $(this).text(),
        chat = $("#chat"),
        yaz = $(this);
    if (durum == "-") {
        yaz.html("+");
        chat.animate({
            opacity: 0.50,
            bottom: "-314px"
        }, 1000);

    } else {
        yaz.html("-");
        chat.animate({
            opacity: 1,
            bottom: "0px"
        }, 1000);

    }

});


$('#txt').keydown(function(e) {
    if (e.keyCode == 13) {
        var yaz = "<div class='o'><img align='right' src='http://gravatar.com/avatar/7124bc62949227ac21a52e9533e6d478?s=80'width='30px'>© Copyright 2013 - Ayhan ALTINOK",
            yazi = $("#txt").val(),
            output = $('.mesaj-gecmisi'),
            img = "<img align='left' src='http://gravatar.com/avatar/5b4d09ae59d9935cffa9fc1a08b9ec12?s=80'width='30px'>",
            sil = "<div class='sil'></div>";


        $("#sonuc").append("<div class='sen'>" + img + yazi + sil + "</div>" + sil + yaz + sil + "</div>");


        output.scrollTop(
            output[0].scrollHeight - output.height()
        );

        $("#form")[0].reset();

    }

});

$("#txt").bind("click", function() {
    $(".islem").html("Message Sent");
});