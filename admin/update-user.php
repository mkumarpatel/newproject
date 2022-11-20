<?php include "header.php"; ?>
    <?php
                      include 'config.php';

                       if(isset($_POST['submit'])){
                                 $user_id=$_POST['user_id'];
                                $fname=$_POST['fname'];
                                $lname=$_POST['lname'];
                                $username=$_POST['uname'];
                                $role=$_POST['role'];
                                $upd="UPDATE `user` SET first_name='$fname',last_name='$lname',username='$username',user_role='$role' WHERE user_id='$user_id'";
                                if(mysqli_query($conn,$upd)){
                                    header("location:users.php");                            
                            
                                }
                              }
                            
                     ?> 
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <?php 
                     include'config.php';
                     $user_id=$_GET['nid']; 
                    $sel="SELECT * FROM `user` WHERE `user_id`= '$user_id'";
                     $exe=mysqli_query($conn,$sel) or die("Query Failed");
                           while($row = mysqli_fetch_assoc($exe)){
                          
                             ?>
                    
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                       <div class="form-group">
                          <label>UserName</label>
                          <input type="text" name="uname" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['user_role']; ?>">
                          <?php  
                          if($row['user_role']== 1){ 
                            echo "<option value='1' name='role' selected>Admin</option>
                            <option value='0' name='role'>Normal User</option>"; 
                          }else{
                               echo "<option value='0' name='role'selected>Normal User</option>
                              <option value='1' name='role' >Admin</option>
                                 "; 

                          }
                           ?>
          
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                <?php }?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
