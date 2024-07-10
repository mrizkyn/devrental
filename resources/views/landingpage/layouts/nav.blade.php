<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .navbar-nav .nav-link {
            font-weight: bold;
            color: black;
        }
        .navbar {
            padding-left: 100px;
            padding-right: 100px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light" style=" background-color: white;">
    <a class="navbar-brand" href="#"><b>DEVRENTAL</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Daftar Mobil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Kontak</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>

        </ul>
    </div>
</nav>

</body>
</html>
