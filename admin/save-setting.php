<?php
  include 'config.php';

  if(empty($_FILES['logo']['name'])){
         $file_name=$_POST['old_images'];
  }else{
       $errors=array();
              $file_name=$_FILES['logo']['name'];
              $tmpName=$_FILES['logo']['tmp_name'];
              $file_size=$_FILES['logo']['size'];
              $file_ext=end(explode('.',$file_name));
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
              move_uploaded_file($tmpName,"images/".$file_name);

            }else
            {
             print_r($errors);
             
            }
          }
             $name=$_POST['website_name'];
             $footerdes=$_POST['footerdesc'];
             $UpdateQuaery="UPDATE `settings` SET`websitename`='$name',`logo`='$file_name',`footerdes`='$footerdes'";                    
                $result = mysqli_query($conn,$UpdateQuaery);
                if($result){
                header('location:setting.php');
            }else
                echo "Query Failed";
 ?>