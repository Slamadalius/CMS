<?php include "include/db.php"; ?>
   <?php include "include/header.php"; ?>

      <!-- Navigation -->
      <?php include "include/navigation.php" ?>

         <!-- Page Content -->
         <div class="container">

            <div class="row">

               <!-- Blog Entries Column -->
               <div class="col-md-8">

                  <?php 
                  $query = "SELECT * FROM posts WHERE post_status='published'";
                  $select_all_post = mysqli_query($connection, $query);
                   

                  while($row = mysqli_fetch_assoc($select_all_post)) {
                      $post_id = $row['post_id'];
                      $post_title = $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_image = $row['post_image'];
                      $post_content = substr($row['post_content'],0,200);
                      
                      if($select_all_post -> num_rows == 0){
                         echo "<h1>No Post Found</h1>";
                      }
                     
                     ?>

                     <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                     <!-- First Blog Post -->
                     <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?> "><?php echo $post_title ?></a>
                </h2>
                     <p class="lead">
                        <a href="index.php">
                           <?php echo $post_author ?>
                        </a>
                     </p>
                     <p><span class="glyphicon glyphicon-time"></span>
                        <?php echo $post_date ?>
                     </p>
                     <hr>
                     <a href="post.php?p_id=<?php echo $post_id ?>">
                     <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                     </a>
                     <hr>
                     <p>
                        <?php echo $post_content ?>
                     </p>
                     <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                     <hr>

                     <?php } ?>




               </div>


               <?php include "include/sidebar.php"; ?>
            </div>
            <hr>

            <?php include "include/footer.php";?>