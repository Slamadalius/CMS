<table class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>Id</th>
         <th>Author</th>
         <th>Comment</th>
         <th>Email</th>
         <th>Status</th>
         <th>In Response to</th>
         <th>Date</th>
         <th>Approve</th>
         <th>Unapprove</th>
         <th>Delete</th>
      </tr>
   </thead>
   <tbody>

      <?php 
                  $query = "SELECT * FROM comments";
                  $select_comments = mysqli_query($connection, $query); 

                     while($row = mysqli_fetch_assoc($select_comments)) {
                      $comm_id = $row['comm_id'];
                      $comm_author = $row['comm_author'];
                      $comm_post_id = $row['comm_post_id'];
                      $comm_content = $row['comm_content'];
                      $comm_status = $row['comm_status'];
                      $comm_date = $row['comm_date'];
                      
                           
                        echo "<tr>";
                        echo "<td>{$comm_id}</td>";
                        echo "<td>{$comm_author}</td>";
                        echo "<td>{$comm_content}</td>";
                        
//                           $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//                           $select_categories = mysqli_query($connection, $query);
//
//                           confirm($select_categories);
//
//                           while($row = mysqli_fetch_assoc($select_categories)) {
//                           $cat_id = $row['cat_id'];
//                           $cat_title = $row['cat_title'];
//                            echo "<td>{$cat_title}</td>";
//                           }
                        
                        
                        echo "<td>{$comm_status}</td>";
                        
                        $query = "SELECT * FROM posts WHERE post_id = {$comm_post_id}";
                        $select_post_id_query = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_post_id_query)){
                           $post_id = $row['post_id'];
                           $post_title = $row['post_title'];
                           
                           echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }
                        
                        echo "<td>{$comm_date}</td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={}'>Approve</a></td>";
                        echo "<td><a href='posts.php?delete={}'>Unapprove</a></td>";
                        
                        echo "<td><a href='comments.php?delete={$comm_id}'>Delete</a></td>";
                        echo "</tr>";   
                     }
                           
                           ?>

   </tbody>
</table>


<?php 
if(isset($_GET['delete'])){
   $the_comm_id = $_GET['delete'];
   $query = "DELETE FROM comments WHERE comm_id = {$the_comm_id}";
   $delete_query = mysqli_query($connection, $query);
   
   header("Location: comments.php");
}

?>