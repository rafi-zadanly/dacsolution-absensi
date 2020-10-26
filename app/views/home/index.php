<!doctype html>
<html lang="en">
<head>
    <title>DAC Absensi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/home-style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/loader/waitMe.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary container shadow rounded-bottom">
        <a class="navbar-brand primary-font" href="#">DAC Absensi</a>
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
                <div class="alert" role="alert"></div>
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
                        <small>*Tugas luar hanya dapat diisi saat absen kehadiran saja.</small>
                        <input type="number" name="" id="pin" class="form-control shadow-sm rounded-pill mt-2 secondary-font" placeholder="Masukan PIN" autocomplete="off">
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
    <script src="<?= BASEURL ?>/loader/waitMe.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.container .row .col-6').waitMe({
                effect:'win8',
                text:'Mohon tunggu...',
                bg:'rgba(0,0,0,0.3)',
                color:'#fff',
                maxSize:'',
                waitTime: -1,
                source:'',
                textPos:'vertical',
                fontSize:'',
                onClose: function() {}
            });
            $('.alert').hide();
            loader_hide();
            
            $("#pin").focus();
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
                my_alert("Izinkan menggunakan webcam untuk melakukan absensi.", "danger")
            }

            var tugas_luar = false;

            $("#tugas-luar").change(function () { 
                if (this.checked == true) {
                    $("#tujuan").slideDown(150);
                    $("#tujuan").focus()
                    tugas_luar = true;
                } else {
                    $("#tujuan").slideUp(150);
                    $("#pin").focus()
                    tugas_luar = false;
                }
            });

            $("#pin").keyup(function (e) { 
                var isWebcamOn = document.querySelector("#video-webcam").srcObject;
                var pin = $(this).val();
                var tujuan = $("#tujuan").val();

                if (pin.length == 6) {
                    loader();
                    $(this).val("");
                    $("#tujuan").val("");

                    if (isWebcamOn) {
                        $.get("home/attend_time/" + pin, function(response, status) {
                            if (response == "") {
                                absent(pin, tujuan);
                                loader_hide();
                            }else{
                                var confirmation = confirm("Anda bekerja selama " + response + ", Apakah anda ingin melanjutkan?")
                                if (confirmation) {
                                    absent(pin, tujuan);
                                }
                                loader_hide();
                            }
                        });
                    }else{
                        my_alert("Webcam belum siap atau belum dinyalakan.", "danger");
                        loader_hide();
                    }
                }
            });

            function absent(pin, tujuan){
                init();
                snapshot();
                $("#myCanvas").hide();
                
                var dataURL = canvas.toDataURL();
                var data = {
                    pin: pin,
                    image: dataURL,
                    tugas_luar: tugas_luar,
                    tujuan: tujuan
                }

                if (tugas_luar && tujuan == "") {
                    my_alert("Tujuan harus diisi.", "danger");
                }else{
                    $.post("home/absent", data, function(response, status) {
                        response = JSON.parse(response);
                        if (response["status"] == "success") {
                            my_alert(response["message"], "success");
                        }else{
                            my_alert(response["message"], "danger");
                        }
                        
                    })
                }
            }

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

                var text = $("#time").html();

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

            function loader(){
                $('.waitMe').show();
            }

            function loader_hide(){
                $('.waitMe').hide();
            }

            function my_alert($msg, $type){
                $('.alert').slideDown(200);
                if ($type == "success") {
                    $('.alert').removeClass('alert-danger');
                    $('.alert').addClass('alert-success');
                }else{
                    $('.alert').removeClass('alert-success');
                    $('.alert').addClass('alert-danger');
                }
                $('.alert').html($msg);
                setTimeout(() => {
                    $('.alert').slideUp(200);
                }, 5000);
            }
        });
    </script>
</body>
</html>