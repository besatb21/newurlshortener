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

if (isset($_POST['submit']))
{
    if (isset($_POST['disabled']))
    {
        $disabled = $_POST['disabled'] == 'on' ? 1 : 0;
        $user->disabled = $disabled;
    }
    
    if (isset($_POST['role']))
    {
        $role = intval($_POST['role']);

        if (isset(UserRole::$MAP[$role]))
            $user->role = $role;
    }
    
    $user->update();
    echo "UDPATE!";
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
               
                    <select  name="role" class=" mr-4 form-select">
                        <?php foreach(UserRole::$MAP as $roleId => $roleName) { ?> 
                            <option value=<?=$roleId ?> <?=$user->role==$roleId ? 'selected' : ''?>> <?=$roleName ?> </option>
                        <?php } ?>
                    </select>

                    <label for="status">Disabled</label>
                    <input type="checkbox" name="disabled" <?=$user->isDisabled() ? 'checked' : '' ?> />

                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
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