<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">add post</a>
      </div>
      <div class="col-md-12">
           <table class="content-table">
            <thead>
              <th>S.No.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date</th>
              <th>Author</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
                <?php
                 error_reporting(0);
                include 'config.php';
              if($_SESSION['user_role']== 1){
                $sql="SELECT * FROM post LEFT JOIN category ON post.category = category.category_id
                      LEFT JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC";
              }else{
                   $sql="SELECT * FROM post LEFT JOIN category ON post.category = category.category_id
                      LEFT JOIN user ON post.author = user.user_id WHERE post.author={$_SESSION['user_id']}";
             

              }        
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                  while($row=mysqli_fetch_assoc($result)){
                   ?> 
              <tr>
                <td class='id'><?php echo $row['post_id'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><?php echo $row['post_date'] ?></td>
                 <td><?php echo $row['username'] ?></td>
                <td class='edit'><a href='update-post.php?edit=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                 <?php
                error_reporting(0);
                include 'config.php';
                $nid=$_GET['nid'];
                $del=$_GET['del'];

                // $del ="SELECT * FROM `post` WHERE `post_id`='$nid'";
                //         $result=mysqli_query($conn,$del);
                //         $row=mysqli_fetch_assoc($result);
                //           echo'<pre>';
                //         print_r($row);
                //         echo'</pre>';



                $del="DELETE FROM `post` WHERE `post_id`='$nid';";
                $del.= "UPDATE `category` SET post=post-1 WHERE `category_id` ='$del'";
                     mysqli_multi_query($conn,$del)or die('Query Faild');
                ?>
                <td class='delete fs-4'><a class="btn btn-danger pt-2" href='post.php?nid=<?php echo $row['post_id']; ?>&?del=<?php echo $row['post.category'] ?>'><i class='fa fa-trash-o text-white fs-4'></i></a></td>
              </tr>


        <?php }
      }?>
          </tbody>
        </table>
        <ul class='pagination admin-pagination'>
          <li class="active"><a>1</a></li>
          <li><a>2</a></li>
          <li><a>3</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
