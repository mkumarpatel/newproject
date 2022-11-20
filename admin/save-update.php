<?php
  include 'config.php';

  if(empty($_FILES['new_images']['name'])){
         $file_images=$_POST['old_images'];
  }else{
       $errors=array();
              $imageName=$_FILES['new_images']['name'];
              $tmpName=$_FILES['new_images']['tmp_name'];
              $file_size=$_FILES['new_images']['size'];
              $file_ext=end(explode('.',$imageName));
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
             die(); 
            }
          } 
             $post_id=$_POST['post_id'];
             $title=$_POST['post_title'];
             $postdesc=$_POST['postdesc'];
             $category=$_POST['category'];
             $UpdateQuaery="UPDATE `post` SET`title`='$title',`description`='$postdesc',`category`='$category',`post_img`='$file_images' WHERE `post_id`='$post_id'";
             $UpdateQuaery.= "UPDATE `category` SET post=post-1 WHERE `category_id` ='$del'";
                    
                $result = mysqli_multi_query($conn,$UpdateQuaery);
                if($result){
                header('location:post.php');
            }else
                echo "Query Failed";
 ?>