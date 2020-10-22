<!doctype html>
<html lang="en">
<head>
    <title>Login - DAC Solution</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
</head>
<body class="login">
    <div class="row p-0">
        <div class="col-8 bg-dark left-container"></div>
        <div class="col-4 right-container bg-light">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="mt-5 p-3"></div>
                    <h1 class="mt-5 text-center">Login</h1>
                    <div class="form-group mt-5">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group mt-3">
                        <label for="pin">Pin</label>
                        <input type="password" class="form-control" name="pin" id="pin" aria-describedby="helpId" placeholder="" autocomplete="off">
                    </div>
                    <button class="btn btn-primary w-100 mt-3 rounded-pill">Sign In</button>
                    <p class="text-center mt-4">
                        <small>Lupa pin? <a href="/forgot-pin">klik disini</a></small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>