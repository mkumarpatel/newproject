<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Users</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-user.php">add user</a>
      </div>
      <div class="col-md-12">


        <table id="example" class="table table-striped">
          <thead>
            <tr>
              <th class="bg-dark text-white fs-4">S.No.</th>
              <th class="bg-dark text-white fs-4">Full Name</th>
              <th class="bg-dark text-white fs-4">User</th>
              <th class="bg-dark text-white fs-4">Email</th>
              <th class="bg-dark text-white fs-4">Password</th>
              <th class="bg-dark text-white fs-4">Role</th>
              <th class="bg-dark text-white fs-4">Edit</th>
              <th class="bg-dark text-white fs-4">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            include'config.php'; 
            $sel="SELECT * FROM `user` ORDER BY `user_id` DESC";
            $exe=mysqli_query($conn,$sel) or die("Query Failed");
            if(mysqli_num_rows($exe)>0){
              $count = 1;
             while($row = mysqli_fetch_assoc($exe)){

               ?> 
               <tr>
                <td class='id fs-4'><?php echo $count; ?></td>
                <td class="fs-4"><?php echo $row['first_name'] ." ". $row['last_name']; ?></td>
                <td class="fs-4"><?php echo $row['username']; ?></td>
                <td class="fs-4"><?php echo $row['email']; ?></td>
                <td class="fs-4"><?php echo $row['password']; ?></td>
                <td class="fs-4"><?php echo($row['user_role']== 1)?"Admin":"Normal Admin"; ?></td>

                <td class='edit fs-4'><a class="btn btn-warning text-white pt-3" href='update-user.php?nid=<?php echo $row['user_id']; ?>'><i class='fa fa-edit text-white fs-4'></i></a></td>
                <?php
                error_reporting(0);
                include 'config.php';
                $nid=$_GET['nid'];
                $del="DELETE FROM `user` WHERE `user_id`='$nid'";
                mysqli_query($conn,$del);
                ?>
                <td class='delete fs-4'><a class="btn btn-danger pt-2" href='users.php?nid=<?php echo $row['user_id']; ?>'><i class='fa fa-trash-o text-white fs-4'></i></a></td>
              </tr>
              <?php 
              $count++;
            }
          } ?>

        </tbody>
      </table>


      
  </div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
