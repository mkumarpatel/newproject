<?php
  include 'config.php';
  if(isset($_POST['save'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $sel="SELECT * FROM `user` where username='$username'And password='$Password'";
    $exe=mysqli_query($conn,$sel);
    if(mysqli_num_rows($exe)>0){
        $error="User Name Alrady Exists.";
    }else{
        $ins="INSERT INTO user (first_name,last_name,username,email,password,user_role)VALUES('$fname','$lname','$username','$email','$password','$role')";
        if(mysqli_query($conn,$ins)){
                 session_start();
                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['user_role']=$role;
        header("location:index.php");


      }else{
         echo mysqli_error($conn);
      }

    }
  }

 ?>
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="" method ="POST" autocomplete="off">
                      <div class="text-danger"><?php echo $error; ?></div>
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                            <div class="form-group">
                          <label>User</label>
                          <input type="text" name="username" class="form-control" placeholder="user" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role">
                              <option value="0" name="role">Normal User</option>
                              <option value="1" name="role">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
