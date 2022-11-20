<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Website Settings</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
          <?php 
            include 'config.php';
            $sql= "SELECT * FROM `settings`";
             $result=mysqli_query($conn,$sql) or die('Query Failed');

           if(mysqli_num_rows($result)>0){
           while($fetch=mysqli_fetch_assoc($result)){
          ?>
          <form action="save-setting.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="website_name">Website Name</label>
                <input type="text" name="website_name"value="<?php echo $fetch['websitename'] ?>"  class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Website Logo</label>
                <input type="file" name="logo">
                <img  src="admin/images/<?php echo $fetch['logo']; ?>" height="150px">
                <input type="hidden" name="old_images" value="<?php echo $fetch['logo']; ?>">            
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Footer Description</label>
                <textarea name="footerdesc" class="form-control"  required rows="5">
                  <?php echo $fetch['footerdes'] ?>   </textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
         <?php
          }
          }else{
            echo mysqli_error($conn);  
          }
         ?>
        <!-- Form End -->
    
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
