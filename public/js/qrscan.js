var scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
    scanPeriod: 5,
    mirror: false,
});

scanner.addListener("scan", function (content) {
    if (content != "")
        $.ajax({
            type: "get",
            url: "/volunteer/verify",
            data: { content: content },
            success: function (data) {
                // document.getElementById("data-response").value = data;
                if (data != "") alert(data);
                // $("#data-response").after(data);
                // $(".data-response").html(data);
                else alert("Empty");
            },
        });
});
Instascan.Camera.getCameras()
    .then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            $('[name="options"]').on("change", function () {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert("No Front camera found!");
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert("No Back camera found!");
                    }
                }
            });
        } else {
            console.error("No cameras found.");
            alert("No cameras found.");
        }
    })
    .catch(function (e) {
        console.error(e);
        alert(e);
    });

$("#instaStop").click(function () {
    scanner.stop();
    $("#preview").hide();
});
$("#instaStart").click(function () {
    scanner.start();
    $("#preview").show();
});
$(function () {
    setTimeout(function () {
        $(".data-response").hide("blind", {}, 500);
    }, 5000);
});
