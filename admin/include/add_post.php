<?php 
if(isset($_POST['add_post'])){
   $post_title = $_POST['post_title'];   
   $post_category_id = $_POST['post_category'];
   $post_author = $_POST['post_author'];
   $post_status = $_POST['post_status'];
   
   $post_image = $_FILES['post_image']['name'];
   $post_image_temp = $_FILES['post_image']['tmp_name'];
   
   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');
   
   
   move_uploaded_file($post_image_temp, "../images/$post_image");
   
   $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
   
   $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
   
   $create_post_query = mysqli_query($connection, $query);
   
   confirm($create_post_query);
   
   echo "Post Added Succesfully.";
}


?>
  

  
  
  
  
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="post_title">
   </div>
   <div class="form-group">
      <label for="post_category">Post Category</label><br>
      <select class="" name="post_category" id="">
         <?php 
         
         $query = "SELECT * FROM categories";
         $select_categories = mysqli_query($connection, $query);
         
         confirm($select_categories);

         while($row = mysqli_fetch_assoc($select_categories)) {
         $cat_id = $row['cat_id'];
         $cat_title = $row['cat_title'];
          echo "<option value='$cat_id'>{$cat_title}</option>";
         }
         
         
         ?>
         <option value=""></option>
      </select>
   </div>
   <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" name="post_author">
   </div>
  
  <div class="form-group">
  <label for="">Post Status</label>
   <select name="post_status" id="">
     
      <option value="draft">Post Status</option>
      <option value="published">published</option>
      <option value="draft">draft</option>
   </select> 
   </div>
   
   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" class="form-control" name="post_image">
   </div>
   <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
   </div>
   <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
   </div>
   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="add_post" value="Add Post">
   </div>

</form>