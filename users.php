<?php 
require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Domain\Model\User;
use Shortener\Domain\Model\UserRole;
use Shortener\Domain\Model\Short;

Auth::instance()->logInGuard();
Auth::instance()->roleGuard(array(UserRole::ADMIN));

$users =User::select()->get();
// $users = Auth::instance()->user()->select()->get();

// print_r($users);

include 'Common/header.php' ;

function disabledStatus($disabled) {
  if ($disabled == 0 || $disabled == null)
    return "Enabled";
  return "Disabled";
}
?>

<div class=" position-absolute w-100  "  >
<br>
<h5 style="text-align:center">List of users</h5>
<table class=" table table-sm  w-75  table-bordered" style="margin:auto">
  <thead>
    <tr>
      <th scope="col">User</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th> 

    </tr>
  </thead>
  <tbody>
  <?php for ($i = 0; $i <count($users); $i++)  { ?>
      <tr>
        <td><?= $users[$i]->username?></td>
        <td><?= disabledStatus($users[$i]->disabled)?></td>
        <td><a href="user.php?username=<?=$users[$i]->username?>"  class ="btn btn-primary lg">Edit</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
