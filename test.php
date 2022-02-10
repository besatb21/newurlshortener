<?php
require_once __DIR__ . '/startup.php';

use Shortener\Domain\Model\Base\{BaseModel, ModelField};
use Shortener\Services\DB;

$db = DB::instance();
// $model = new BaseModel();

include_once "Common/header.php";
?>

<h1>
    Hello World!
</h1>

<?php
include_once "Common/footer.php";
?>