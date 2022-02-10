<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <title>Hello, world!</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Url Shortener</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                    </li>
                </ul>
                <?php
                if(isset($_SESSION) && empty($_SESSION['authenticated']))
                echo '
                <span class="navbar-text">
                    <a  class="btn  btn-sm navbar-button border border-light " href="login.php" role="button">Login</a>
                </span> ';

                else 
                    echo '
                    <span class="navbar-text">
                    <a  class="btn  btn-sm navbar-button border border-light " href="index.php" role="button">Logout</a>
                     </span> ';
                ?>
            </div>

        </nav>

    