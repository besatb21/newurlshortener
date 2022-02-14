<?php 
require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;
use Shortener\Services\Authentication\AuthException;

if (Auth::instance()->loggedIn())
    header('Location: index.php');

$validationError = "";

if (isset($_POST['submit']))
{
    // Login:
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    try 
    {
        Auth::instance()->logIn($username, $password);
        header('Location: index.php');
    } 
    catch (AuthException $e)
    {
        // Handle exception here: $e->getMessage()
        $validationError = $e->getMessage();
    }
}

include 'Common/header.php' ;

?>

<form method="POST" action="">
    <div class ="d-flex flex-column justify-content-center align-items-center" style ="margin-top:100px"> 
        <div class="  form-group  col-md-2 ">
            <label for="username">Username</label>
            <input type="text" class="form-control position-relative translate-middle start-50 top-50 " name="username" id="username" placeholder="Enter username">
        </div>
        <div class=" form-group col-md-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">

            <?php if ($validationError) { ?>
                <br>

                <div class="alert alert-danger" role="alert">
                    <?=$validationError?>
                </div>
            <?php } ?>
                       
            <button type="submit" name="submit" class="w-100 btn border-dark"style="background-color :#8df1e1; margin-top:15px ">Login</button> 
 
        </div>
  </div> 
</form>

<?php
    include 'Common/footer.php'
?>