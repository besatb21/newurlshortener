<?php 
require_once __DIR__ . '/startup.php';

use Shortener\Services\Authentication\Auth;

include 'Common/header.php' ;  

// <!-- getting username and password form and printing a message if they are not found in the db  -->

$reset_form = false;

if (isset($_POST['submit'])) {
   
    $clean = array();
    $validation_messages = array();
    $trimmed_username = trim($_POST['username']);
    // check username first
    if (strlen($trimmed_username) == 0) {
        $validation_messages['username'] = 'Username cannot be empty!';
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $trimmed_username)) {
        $validation_messages['username'] = 'Username can only have digits, letters and _';
    } else if (Auth::instance()->userExists($trimmed_username)) {
        $validation_messages['username'] = 'Username already exists!';
    }
    // check password
    $trimmed_password = trim($_POST['password']);
    if (strlen($trimmed_password) < 6)
        $validation_messages['password'] = 'Password needs more than 6 chars!';
    else if($_POST['passwordA']!=$trimmed_password)
        $validation_messages['password'] ='Passwords don\'t match ';
    else
        $clean['password'] = $trimmed_password;

   
    if (count($validation_messages) == 0)
    {
        // No validation errors, create a user:
        $result = Auth::instance()->register($trimmed_username, $trimmed_password);
    }
   

}

?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    

<div class="d-flex  justify-content-center  align-items-center"  style="  margin-top:80px;"     >
        <div class =" d-flex flex-column col-md-2" > 

        <div class=" form-group " >
            <label for="username">Username</label>                
            <input  type="text"  name ="username" value="<?=(isset($_POST['username'])  && !$reset_form) ? 
                                htmlentities($_POST['username']) : 
                            ''; ?>"
                class="form-control  " id="username" placeholder="Enter username">
                <?php if(isset($validation_messages) && !empty($validation_messages['username']))
                echo ' <h6 style="color: darkred">'.$validation_messages['username'].' </h6> '; ?>
        </div>

        <div class="  form-group ">
            <label for="pass">Password</label>
            <input type="password" name ="password" class="form-control" id="pass" placeholder="Password">
            <label for="passA">Password again!</label>
            <input type="password" name ="passwordA" class="form-control" id="passA" placeholder="Password">

<?php if(isset($validation_messages) && !empty($validation_messages['password']))
                echo '  <h6 style="color: darkred">'.$validation_messages['password'].' </h6>';
           ?>
        </div>         
    
    <button name='submit' type="submit" style="background-color :#8df1e1;" class="  btn border-dark btn ">Sign up</button> 

    </div>   
    
</div>

</form>


<?php
    include 'Common/footer.php'
?>