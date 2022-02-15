<?php

require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Domain\Model\User;
use Shortener\Domain\Model\UserRole;

Auth::instance()->logInGuard();
Auth::instance()->roleGuard(array(UserRole::ADMIN));

$username = $_GET['username'];
$user = User::select()->where('username', '=', $username)->first();

if (isset($_POST['disable'])) {
    $user->disable();
} else if (isset($_POST['enable'])) {
    $user->enable();
}

include 'Common/header.php' ; ?>

<!-- <div class="position-relative w-75 border border-primary" style="margin:auto"> -->
<div class="container">
    <?php if ($user == null) { ?>
        <h1>User not found!</h1>
    <?php } else { ?>
        <div class="text-center">User information</div>
        <div class="row">
            <div class="col-sm-8">
                <span><?=$user->username?></span>
            </div>
            <form action="" method="POST">
                <div class="d-flex col-sm-4 justify-content-end">
                    <? if ($user->isDisabled()) { ?>
                        <button type="submit" name="enable" class="btn btn-primary">Enable</button>
                    <?php } else {?>
                        <button type="submit" name="disable" class="btn btn-primary">Disable</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    <?php } ?>
</div>

<?php
include 'Common/footer.php' ;
?>