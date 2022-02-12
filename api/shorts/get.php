<?php

require_once __DIR__ . '/../../startup.php';

use chillerlan\QRCode\QRCode;
use Shortener\Services\Shortening\Shortener;
use Shortener\Services\Shortening\ShorteningException;


$short = isset($_GET['short']) ? $_GET['short'] : null;
$qr = isset($_GET['qr']) ? $_GET['qr'] : null;


try {
    $shortened = Shortener::instance()->getShort($short);

    $resultObj = array(
        'Result' => array(
            'Short' => $short,
            'URL' => $shortened->url
        )
    );

    if ($qr) {
        $resultObj['Result']['QR'] = (new QRCode())->render($shortened->url);
    }

    echo json_encode($resultObj);
} catch (ShorteningException $e)
{
    echo $e->getMessage();

    echo json_encode(array(
        'Error' => $e->getMessage()
    ));
}

?>