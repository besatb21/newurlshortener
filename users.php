
<?php 
require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Domain\Model\User;

Auth::instance()->logInGuard();

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

<h1> if u are here you are admin </h1>

<div class=" position-absolute w-100  "  >
<br>
<h5 style="text-align:center">List of your shortened URLs</h5>
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
        <td><a href="user.php?username=<?=$users[$i]->username?>"  class ="btn-sm btn-primary">Edit</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
