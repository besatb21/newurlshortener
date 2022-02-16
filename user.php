<?php

require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Domain\Model\User;
use Shortener\Domain\Model\UserRole;
use Shortener\Domain\Model\Short;

Auth::instance()->logInGuard();
Auth::instance()->roleGuard(array(UserRole::ADMIN));

$username = $_GET['username'];
$user = User::select()->where('username', '=', $username)->first();
$urls = Short::select()->where('user_id', '=', $user->id)->get();

if (isset($_POST['disable'])) {
    $user->disable();
} else if (isset($_POST['enable'])) {
    $user->enable();
}

include 'Common/header.php' ; ?>

<!-- <div class="position-relative w-75 border border-primary" style="margin:auto"> -->
<div class="container w-100  ">
    <?php if ($user == null) { ?>
        <h1>User not found!</h1>
    <?php } else { ?>
        <div class="text-center mb-3 ">User information</div>
        <div class="  w-75 row  d-flex justify-content-center " style="margin:auto">
            <div class=" col-sm-2  ">
                <span class="font-weight-bold"><?=$user->username?></span>
            </div>
            <form action="" method="POST">
                
            <div class="col-sm-12 -primary " >
               
                <select  name="roleEdit"class=" mr-4 form-select">
                    <option selected>Role</option>
                    <?php 
                    foreach(UserRole::$MAP as $roleId => $roleName)
                    {
                        ?> 
                        <option value=<?=$roleId ?> > <?=$roleName ?> </option>
                    <?php } ?>
                        
                </select>
             <?php if ($user->isDisabled()) { ?>
                        <input type="submit" name="enable" class="btn-sm btn-primary  " value="Enable"/>
                    <?php } else {?>
                        <input type="submit" name="disable" class="btn-sm btn-primary" value ="Disable"/>
                                            <?php } ?>
                </div>
            </form>
        </div>

        <table class=" table table-sm  w-50  table-bordered" style="margin:auto">
  <thead>
    <tr>
      <th scope="col">URL</th>
      <th scope="col">Short URL</th>
      
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($urls); $i++) { ?>
      <tr>
        <td><?=$urls[$i]->url?></td>
        <td><?=$urls[$i]->shortcode?></td>
       
      </tr>
    <?php } ?>
  </tbody>
</table>

        </div>
    <?php } ?>
</div>

<?php
include 'Common/footer.php' ;
?>