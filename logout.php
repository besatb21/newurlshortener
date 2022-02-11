<?php
require_once __DIR__ . '/startup.php';

Shortener\Services\Authentication\Auth::instance()->logOut();
header('Location: index.php');