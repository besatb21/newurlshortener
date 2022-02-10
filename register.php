<?php 
    include 'common/header.php' ;

  


// <!-- getting username and password form and printing a message if they are not found in the db  -->

$reset_form = false;

if (isset($_POST['submit'])) {
    echo $_POST['username'];
    $clean = array();
    $validation_messages = array();
    $trimmed_username = trim($_POST['username']);
    // check username first
    if (strlen($trimmed_username) == 0) {
        $validation_messages['username'] = 'Username cannot be empty!';
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $trimmed_username)) {
        $validation_messages['username'] = 'Username can only have digits, letters and _';
    } else {

        // check if there exist any username with the same username ~
    }
    // check password
    $trimmed_password = trim($_POST['password']);
    if (strlen($trimmed_password) < 6)
        $validation_messages['password'] = 'Password cannot be less than 6 chars!';
    else
        $clean['password'] = $trimmed_password;
    
    //check if any validation failed 
   

}

?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    
<?php
 if(isset($validation_messages) )
            echo '<div class="d-flex  justify-content-center align-items-center   style ="margin-top:100px"> 
                 <div class =" d-flex flex-column  "  style="margin-left:auto;  margin-top:100px;">  ';
   
else  echo '<div class="d-flex  justify-content-center  align-items-center  style ="margin-top:100px" ">
                <div class =" d-flex flex-column "  style="  margin-top:100px;"> ';
?>


       
        <div class=" form-group " >
            <label for="username">Username</label>
            
                
            <input  type="text"  name ="username" value="<?=(isset($_POST['username'])  && !$reset_form) ? 
                                htmlentities($_POST['username']) : 
                            ''; ?>"
                class="form-control  " id="username" placeholder="Enter username">
        </div>

    
        <div class="   form-group ">
            <label for="pass">Password</label>
            <input type="password" name ="password" class="form-control" id="pass" placeholder="Password">
        </div>  
        <div>
    
            <button name='submit' type="submit" class="btn btn-primary">Sign up</button> 
        </div>

    </div>   
  
        <?php if(isset($validation_messages['username']))
                echo '
    <div   style ="padding-left:5px; margin-right:340px" >
          
             <p class ="form-text  " style="color: darkred">'.$validation_messages['username'].' </p>
    
            </div> '; ?>
</div>
</form>


<?php
    include 'common/footer.php'
?>