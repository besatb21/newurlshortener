<?php

require_once __DIR__ . '/../../startup.php';

header('Content: application/json');

use chillerlan\QRCode\{QRCode, QROptions, QRMatrix};
use chillerlan\QRCode\Common\EccLevel;
use Shortener\Services\Shortening\Shortener;
use Shortener\Services\Shortening\ShorteningException;


$options = new QROptions([
	'version'             => 7,
	'outputType'          => QRCode::OUTPUT_IMAGE_PNG,
    'imageBase64'         => false
]);

$short = isset($_GET['short']) ? $_GET['short'] : null;

try {
    $shortened = Shortener::instance()->getShort($short);
    $im = (new QRCode($options))->render($shortened->shortUrl());

    header('Content-type: image/png');

    echo $im;

} catch (ShorteningException $e)
{
    http_response_code(404);
    die();
}

?>