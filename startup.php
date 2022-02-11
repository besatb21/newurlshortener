<?php
/* In this file we have all the startup boilerplate. First thing, we use the Composer autoloader. */

require __DIR__ . '/vendor/autoload.php';

// Start output buffering:
ob_start();

// Start a session:
if (!isset($_SESSION))
    session_start();

?>