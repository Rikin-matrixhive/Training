$(document).ready(function () {
    $('button[name="update"]').click(function () {
        var emaildata = $('input[name="email"]').val();

        $.ajax({
            type: "POST",
            url: "backend.php",
            data: {
                'update': true,
                'email': emaildata,
            },

            success: function (response) {
                console.log(response);

                $(".emailserror").text(response);

                if (response) {
                    alert("success");
                }
                else {
                    alert("fail");

                }
            }
        });

    });
});