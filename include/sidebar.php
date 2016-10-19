<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">



   <!-- Blog Search Well -->
   <div class="well">
      <h4>Blog Search</h4>
      <form action="search.php" method="post">
         <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
         </div>
      </form>
      <!-- searchform --!>
      <!-- /.input-group -->
   </div>
   
   <!-- login -->
   <div class="well">
      <h4>Log in</h4>
      <form action="include/login.php" method="post">
         <div class="form-group">
            <input name="username" placeholder="Enter Username" type="text" class="form-control">
         </div>
         <div class="form-group">
            <input name="password" placeholder="Enter password" type="password" class="form-control">
         </div>
         <span class="form-group-btn">
            <button class="btn btn-primary" name="login" type="submit">Submit</button>
         </span>
      </form>
      <!-- searchform --!>
      <!-- /.input-group -->
   </div>



   <!-- Blog Categories Well -->

   <!-- /.row -->
   <div class="well">
                  <?php 
                  $query = "SELECT * FROM categories";
                  $select_categories_sidebar = mysqli_query($connection, $query);  
                   ?>
         <h4>Blog Categories</h4>
         <div class="row">
            <div class="col-lg-6">
               <ul class="list-unstyled">
                 <?php
                  while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                      $cat_title = $row['cat_title'];
                      $cat_id = $row['cat_id'];
                      
                      echo "<li><a href ='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                   }
                  ?>
               </ul>
            </div>
            <!-- /.col-lg-6 -->
           
            <!-- /.col-lg-6 -->
         </div>
         <!-- /.row -->
   </div>

   <!-- Side Widget Well -->
   <?php include "widget.php"; ?>


</div>