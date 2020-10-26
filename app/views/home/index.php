<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/home-style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary container shadow rounded-bottom">
        <a class="navbar-brand primary-font" href="#">Absensi</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a class="btn text-light my-2 my-sm-0 secondary-font" href="<?= BASEURL ?>/login">Masuk<i class="fa fa-sign-in ml-2" aria-hidden="true"></i> </a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row pl-5 pr-5">
            <div class="col-6 offset-3 card p-3 shadow text-center p-0">
                <center>
                <video autoplay="true" id="video-webcam" class="rounded border border-primary">
                    Browser yang anda gunakan tidak mendukung webcam.
                </video>
                </center>

                <div class="row">
                    <div class="col-12 text-center h5 secondary-font" id="time">Loading time...</div>
                    <div class="col-8 offset-2">
                        <div class="form-check mt-2">
                            <label class="form-check-label secondary-font">
                                <input type="checkbox" class="form-check-input" name="" id="tugas-luar">Tugas Luar
                            </label>
                        </div>
                        <input type="text" name="" id="tujuan" class="form-control shadow-sm rounded-pill mt-2 secondary-font" placeholder="Masukan Tujuan">
                        <input type="number" name="" id="pin" class="form-control shadow-sm rounded-pill mt-2 secondary-font" placeholder="Masukan PIN">
                        <p class="secondary-font mt-3">Lupa pin? <a href="<?= BASEURL ?>/forgot-pin">Klik disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <canvas id="myCanvas"></canvas>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setInterval(() => {
                $.get("home/time_now", function (response, status) {
                    $("#time").html(response);
                })
            }, 1000);

            $("#tujuan").hide();
            $("#pin").focus();
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

            if (navigator.getUserMedia) {
                navigator.getUserMedia({ video: true }, handleVideo, videoError);
            }

            function handleVideo(stream) {
                document.querySelector("#video-webcam").srcObject = stream;
            }

            function videoError(e) {
                alert("Izinkan menggunakan webcam untuk melakukan absensi.")
            }

            $("#tugas-luar").change(function () { 
                if (this.checked == true) {
                    $("#tujuan").slideDown(150);
                    $("#tujuan").focus()
                } else {
                    $("#tujuan").slideUp(150);
                    $("#pin").focus()
                }
            });

            $("#pin").keyup(function (e) { 
                if ($("#pin").val().length == 6) {
                    var data = {pin: $(this).val()}
                    $.post("auth/pin", data, function(response, status) {
                        if (response == "true") {
                            alert("berhasil");
                        }else{
                            alert("gagal");
                        }
                    })
                }
            });

            var canvas, ctx, webcam;

            function init() {
                webcam = document.getElementById("video-webcam");
                canvas = document.getElementById("myCanvas");
                canvas.height = webcam.videoHeight;
                canvas.width = webcam.videoWidth;
                ctx = canvas.getContext('2d');
            }

            function snapshot() {
                var h = canvas.height;
                var w = canvas.width;

                var hn = 600;
                var wn = (w * hn) / h;

                canvas.height = hn;
                canvas.width = wn;

                ctx.drawImage(webcam, 0, 0, wn, hn);

                var text = $("#jam").html();

                var cw, ch;
                cw = wn;
                ch = hn;

                ctx.font = "28px verdana";
                var textWidth = ctx.measureText(text).width;
                ctx.globalAlpha = .50;
                ctx.fillStyle = 'white'
                ctx.fillText(text, cw - textWidth - 10, ch - 20);
                ctx.fillStyle = 'black'
                ctx.fillText(text, cw - textWidth - 10 + 2, ch - 20 + 2);
            }
        });
    </script>
</body>
</html>