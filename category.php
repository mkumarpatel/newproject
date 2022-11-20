<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php 
                     error_reporting(0);
                      if(isset($_GET['cid'])){ 
                           $cat_id=$_GET['cid'];
                               }
                

                            
                      $cat_name="SELECT * FROM category  Where category_id= '$cat_id'";
                      $result=mysqli_query($conn,$cat_name);
                      $fetch=mysqli_fetch_assoc($result);
                    ?>
                  <h2 class="page-heading"><?php echo $fetch['category_name']?></h2>
                        <?php 

                            $sql="SELECT post.post_id,post.title,post.description,category.category_name,post.author,post.post_date,user.username,post.category,post.post_img FROM post LEFT JOIN category ON post.category = category.category_id
                      LEFT JOIN user ON post.author = user.user_id WHERE post.category='$cat_id' ORDER BY post.post_id DESC";      
                         $result=mysqli_query($conn,$sql);
                         if(mysqli_num_rows($result)>0){
                           while($row=mysqli_fetch_assoc($result)){
                 
              
                         ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name'];  ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['author']?>'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                 <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'],0,5) . "...."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                          }

                      }
                        ?>
                        <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
