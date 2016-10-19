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
   
                  if(isset($_GET['p_id'])){
                     $the_post_id = $_GET['p_id'];
                  }               
   
                  $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                  $select_all_post = mysqli_query($connection, $query);
                   

                  while($row = mysqli_fetch_assoc($select_all_post)) {
                      $post_title = $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_image = $row['post_image'];
                      $post_content = $row['post_content'];
                      
                     ?>

                     <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                     <!-- First Blog Post -->
                     <h2>
                    <a href="#"><?php echo $post_title ?></a>
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
                     <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                     <hr>
                     <p>
                        <?php echo $post_content ?>
                     </p>
                     

                     <hr>

                     <?php } ?>

                        <!-- Blog Comments -->
                        
                        <?php 
                           if(isset($_POST['create_comment'])){
                              $the_post_id = $_GET['p_id'];
                              $comm_author = $_POST['comm_author'];
                              $comm_email = $_POST['comm_email'];
                              $comm_content = $_POST['comm_content'];
                                 
                              if(!empty($comm_author) && !empty($comm_email) && !empty($comm_content)){
                              $query = "INSERT INTO comments (comm_post_id, comm_author, comm_email, comm_content, comm_status, comm_date)";
                              $query .= "VALUES ($the_post_id, '{$comm_author}', '{$comm_email}', '{$comm_content}', 'unapproved', now())";
                              
                              $create_comment_query = mysqli_query($connection, $query);
                              
                              if(!$create_comment_query){
                                 die("QUERY FAILED " . mysqli_error($connection));
                              }
                              
                              $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                              $query .= "WHERE post_id = $the_post_id";
                              $update_comment_count = mysqli_query($connection, $query);
                           } else {
                                 echo "<script>alert('Fields cannot be empty')</script>";
                              }    
                        }
                             
                              
                              
                  
                        ?>

                        <!-- Comments Form -->
                        <div class="well">
                           <h4>Leave a Comment:</h4>
                           <form action="" method="post" role="form">
                             <div class="form-group">
                                <label for="comment_author">Name</label>
                                 <input type="text" class="form-control" name="comm_author">
                              </div>
                              <div class="form-group">
                                <label for="comment_email">Email</label>
                                 <input type="email" class="form-control" name="comm_email">
                              </div>
                              <div class="form-group">
                                <label for="comment">Your Comment</label>                                
                                 <textarea class="form-control" name="comm_content" rows="3"></textarea>
                              </div>
                              <button type="submit" name="create_comment" class="btn btn-primary">Comment</button>
                           </form>
                        </div>

                        <hr>

                        <!-- Posted Comments -->
                        
                        <?php 
                        $query = "SELECT * FROM comments WHERE comm_post_id = {$the_post_id} ";
                        $query .= "ORDER BY comm_id DESC";
                        $select_comment_query = mysqli_query($connection, $query);
                        if(!$select_comment_query){
                           die("QUERY FAILED " . mysqli_error($connection));
                        }
                        while($row = mysqli_fetch_array($select_comment_query)){
                           $comm_date = $row['comm_date'];
                           $comm_content = $row['comm_content'];
                           $comm_author = $row['comm_author'];
                        
                        ?>
                        <!-- Comment -->
                        <div class="media">
                           <a class="pull-left" href="#">
                              <img class="media-object" src="http://placehold.it/64x64" alt="">
                           </a>
                           <div class="media-body">
                              <h4 class="media-heading"><?php echo $comm_author; ?>
                            <small><?php echo $comm_date; ?></small>
                              </h4> 
                              <?php echo $comm_content; ?>
                           </div>
                        </div>
                        
                        <?php } 
                        
                        ?>

                      




               </div>


               <?php include "include/sidebar.php"; ?>
            </div>
            <hr>

            <?php include "include/footer.php";?>