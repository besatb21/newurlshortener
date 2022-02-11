<?php
require_once __DIR__ . '/startup.php';

use Shortener\Domain\Model\Base\{BaseModel, ModelField};
use Shortener\Domain\Model\User;
use Shortener\Services\DB;

// $db = DB::instance();
// $model = new BaseModel();

// $user = new User();
// $user->username = "Hello";
// $user->password = "hey";
// $user->role = 1;

// $user->insert();

var_dump(User::select()->first()->delete());

include_once "Common/header.php";
?>

<h1>
    Hello World!
</h1>

<?php
include_once "Common/footer.php";
?>