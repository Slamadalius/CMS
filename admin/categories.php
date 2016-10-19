<?php include "include/admin_header.php" ?>

   <div id="wrapper">

      <!-- Navigation -->
      <?php include "include/admin_navigation.php" ?>

         <div id="page-wrapper">

            <div class="container-fluid">

               <!-- Page Heading -->
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                     <div class="col-xs-6">
                       <?php insert_categories(); ?>
                        <form action="" method="post">
                           <div class="form-group">
                              <label for="cat-title">Category title</label>
                              <input type="text" class="form-control" name="cat_title">
                           </div>
                           <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                           </div>
                        </form>
                       <?php 
                        if(isset($_GET['edit'])){
                           $cat_id = $_GET['edit'];
                           
                           include "include/update_categories.php";
                        }
                        ?>
                     </div>
                     <!--Add Category -->
                     <div class="col-xs-6">
                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                 </tr>
                              </thead>
                              <tbody>
                  <?php findAllCategories(); ?>
                  <?php deleteCategories(); ?>
                              </tbody>
                           </table>
                     </div>

                  </div>
               </div>
               <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

         </div>
         <!-- /#page-wrapper -->

         <?php include "include/admin_footer.php" ?>