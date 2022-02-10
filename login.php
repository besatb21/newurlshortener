<?php 
    include 'common/header.php' ;

        //se we need nje text box per username and one for the password 

        ?>
<!-- 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class= "container border border-primary w-25 " style= " margin-top :120px;">

     
    <div class=" mb-3 position-absolute translate-middle start 50 top-50 border border-primary ">
    <div  class=" align-middle">
    <label for="username" class="form-label pr-2">Username</label>

    <input type="text" class ="form-control"   size ="25" id="username" name="username"
    value="<?=(isset($_POST['username'])  && !$reset_form) ? 
                            htmlentities($_POST['username']) : 
                            ''; ?>">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['username']))
                echo $validation_messages['username'];
        ?>
    </div>
   
    <label for="password" class="form-label pr-2"> Password</label>
 
    <input type="password " class ="form-control" size ="25"  id="password" name="password">
    <div class="form-text" style="color: darkred">
        <?php
            if (isset($validation_messages['password']))
                echo $validation_messages['password'];
        ?>
    </div>
    
    </div>
    <div  class= "row justify-content-md-center  p-2 " >
  <button name="submit" type="submit" class="btn btn-primary  ">Login</button>

</div>
</div>

</div>

  </div>
</form> -->

<form>
    <div class ="d-flex flex-column justify-content-center align-items-center mt-5  " style="margin-top :auto"> 
        <div class="  form-group  col-md-2 ">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control position-relative translate-middle start-50 top-50 " id="username" placeholder="Enter username">
        </div>
        <div class="align-items-center form-group col-md-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
  <div>
  <button type="submit" class="btn btn-primary">Login</button> 
  </div>

  </div> 
</form>


<?php
    include 'common/footer.php'
?>