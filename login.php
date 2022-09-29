<?php

session_start();


include 'connect.php';


$emptysms_user_email = $emptysms_user_password = '';


if(isset($_POST['submit']))
{
     $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password']; 
     
     $user_password = md5($user_password);
     
     if(empty($user_email))
     {
        $emptysms_user_email = "Fil this field.";
     }

     if(empty($user_password))
     {
        $emptysms_user_password = "Fil this field.";
     }

     if(!empty($user_email) && !empty($user_password) )
     {
           $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' ";

           $query = $conn->query($sql);

           if($query->num_rows > 0)
           {
            
            $_SESSION['login'] = 'Login Success';
            header('location:home.php');
           }
           else{
            echo "Not Found";
           }
     }
}





?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Form</title>
  </head>
  <body>
   
   <!-- user = user_first_name , user_last_name , user_email , user_password -->

    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-5">
                <h1>Login Form</h1><hr>
                <?php
                 if(isset($_GET['usercreated']))
                 {
                    echo "User Create Successfully";
                 }
                ?>
                    <form action="login.php" method="post" class="mt-5">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="user_email" class="form-control" value="<?php if(isset($_POST['submit'])) {echo $user_email;}  ?> " >
                            <?php if(isset($_POST['submit'])) { echo $emptysms_user_email; } ?>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" name = "user_password" class="form-control">
                            <?php if(isset($_POST['submit'])) { echo  $emptysms_user_password; }?>
                        </div>

                        <div class="mb-3">
                             <button type="submit" name="submit" class="btn btn-success">Login</button>
                        </div>

                        <h5>Not have account? <a href="user.php"> Register</h5>
                        
                    </form>

            </div> 
            <div class="col-4"></div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>