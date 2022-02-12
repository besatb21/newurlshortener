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
            <a class="navbar-brand" href="index.php">Url Shortener</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <? if(Shortener\Services\Authentication\Auth::instance()->loggedIn()) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="table.php">My URLs</a>
                        </li>
                    <? } ?>
                </ul>

                <? if(!Shortener\Services\Authentication\Auth::instance()->loggedIn()) {?>
                    <span class="navbar-text" style = "margin-right:10px ;">
                        <a  class="btn  btn-sm navbar-button border border-light "   href="register.php" role="button">Sign up</a>
                    </span>

                    <span class="navbar-text">
                        <a  class="btn  btn-sm navbar-button border border-light " href="login.php" role="button">Login</a>
                    </span>

                <?} else {?>
                    <span class="navba-text">
                        <?=Shortener\Services\Authentication\Auth::instance()->user()->username?>
                    </span>
                    <span class="navbar-text">
                        <a class="btn  btn-sm navbar-button border border-light " href="logout.php" role="button">Logout</a>
                    </span> 
                <? } ?>
            </div>

        </nav>

    