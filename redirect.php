<?php
require_once __DIR__ . '/startup.php';

use Shortener\Services\Shortening\Shortener;
use Shortener\Services\Shortening\ShorteningException;


$short = $_GET['short'];

try {
    Shortener::instance()->redirect($short);
} catch (ShorteningException $e)
{
    echo $e->getMessage();
}

?>