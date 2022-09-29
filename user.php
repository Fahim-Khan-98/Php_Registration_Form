
<?php
include 'connect.php';

$emptysms_user_first_name = $emptysms_user_last_name = $emptysms_user_email = $emptysms_user_password = $emptysms_password_again = '';
if(isset($_POST['submit'])){
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password_again = $_POST['user_password_again'];

    $md5_user_password =  md5($user_password);

    if(empty($user_first_name)){
        $emptysms_user_first_name = "Fil this field.";
    }

    if(empty($user_last_name)){
        $emptysms_user_last_name = "Fil this field.";
    }

    if(empty($user_email)){
        $emptysms_user_email = "Fil this field.";
    }

    if(empty($user_password)){
        $emptysms_user_password = "Fil this field.";
    }

    if(empty($user_password_again)){
        $emptysms_password_again = "Fil this field.";
    }

    if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again))
    {
        if($user_password === $user_password_again)
        {
            // $sql = "INSERT INTO users VALUES('$user_first_name','$user_last_name','$user_email','$md5_user_password')";

            $sql = "INSERT INTO users (user_first_name,user_last_name,user_email,user_password)
             VALUES ('$user_first_name','$user_last_name','$user_email','$md5_user_password')";
       


            $result = mysqli_query($conn,$sql);
     
            if(!$result)
            {
             echo"NOT Inserted";
            }
            else{
             header('location:login.php?usercreated');
            }

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

    <title>User Form</title>
  </head>
  <body>
   
   <!-- user = user_first_name , user_last_name , user_email , user_password -->

    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-3">
                <h1>User Register Form</h1><hr>
                    <form action="user.php" method="post" class="mt-5">

                        <div class="mb-2">
                            <label class="form-label">First Name</label>
                            <input type="text" name="user_first_name" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $user_first_name; }  ?>">
                            <?php if(isset($_POST['submit'])) { echo $emptysms_user_first_name; }?>


                           
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="user_last_name" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $user_last_name; }  ?>">
                            <?php if(isset($_POST['submit'])) { echo $emptysms_user_last_name; }?>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" name="user_email" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $user_email; }  ?>">
                            <?php if(isset($_POST['submit'])) { echo $emptysms_user_email; }?>
                           
                        </div>


                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <input type="text" name="user_password" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $user_password; }  ?>">
                            <?php if(isset($_POST['submit'])) { echo $emptysms_user_password; }?>
                        </div>


                        <div class="mb-2">
                            <label class="form-label">Password Again</label>
                            <input type="text" name="user_password_again" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $user_password_again; }  ?>">
                            <?php if(isset($_POST['submit'])) { echo $emptysms_password_again; }?>
                        </div>

                        <div class="mb-2">
                             <button type="submit" name="submit" class="btn btn-success">Submit</button>
                             <h6> Have an account? <a href="login.php">Login</h6>
                        </div>
                       
                        
                      
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