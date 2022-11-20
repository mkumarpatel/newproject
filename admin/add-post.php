<?php include "header.php"; ?>
<?php
   include 'config.php';
        $update=$_GET['edit'];
    if(isset($_FILES['fileToUpload'])){
               
              $errors=array();
              $imageName=$_FILES['fileToUpload']['name'];
              $tmpName=$_FILES['fileToUpload']['tmp_name'];
              $file_size=$_FILES['fileToUpload']['size'];
               $exp=explode('.',$imageName);
               $file_ext=end($exp);
              $exetensions=array("jpeg","jpg","png");


            if(in_array($file_ext, $exetensions)===false)
            {
               $errors[]="this exetension file not allowed, please choose a jpg or png files";
            }
            if($file_size > 2097152)
            {
                $errors[]="file size must be 2mb or lower.";
            }
            if(empty($errors)==true)
            {
              move_uploaded_file($tmpName,"upload/".$imageName);

            }else
            {
             print_r($errors); 
            }
              $title=$_POST['post_title'];
              $description=$_POST['postdesc'];
              $category=$_POST['category'];
              $date=date('d m,y');
              $author=$_SESSION['user_id'];
                    
                $ins="INSERT INTO `post`(`title`,`description`,`category`,`post_date`,`author`,`post_img`)
                VALUES('$title','$description','$category','$date','$author','$imageName');";                    
                echo $ins .="UPDATE `category` SET `post`= post + 1 WHERE `category_id`='$category'"; 
                  if(mysqli_multi_query($conn,$ins)){
                    header('location:post.php');
                    }else{
                      echo mysqli_error($conn);
                    }
                  }
   
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option disabled> Select Category</option>
                                <?php 
                                    include 'config.php';
                                   $sql="SELECT * FROM `category`";
                                          echo $result=mysqli_query($conn,$sql);
                                           if(mysqli_num_rows($result)>0){
                                           while($row=mysqli_fetch_assoc($result)){
                                               echo "<option value={$row['category_id']}>{$row['category_name']}</option>";
                                           }

                                         }
            
                                ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
