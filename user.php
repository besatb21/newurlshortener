<?php

require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Domain\Model\User;

Auth::instance()->logInGuard();

$username = $_GET['username'];
$user = User::select()->where('username', '=', $username)->first();

include 'Common/header.php' ; ?>



<?php
include 'Common/footer.php' ;
?>