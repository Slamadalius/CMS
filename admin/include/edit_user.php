<?php 
if(isset($_GET['edit_user'])){
   $the_user_id = $_GET['edit_user'];
}
$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_user_by_id = mysqli_query($connection, $query); 

                     while($row = mysqli_fetch_assoc($select_user_by_id)) {
                      $user_id = $row['user_id'];
                      $user_name = $row['user_name'];
                      $user_password = $row['user_password'];
                      $user_firstname = $row['user_firstname'];
                      $user_lastname = $row['user_lastname'];
                      $user_email = $row['user_email'];
                      $user_image = $row['user_image'];
                      $user_role = $row['role'];
                     }


if(isset($_POST['update_user'])){   
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_name = $_POST['user_name'];
   
//   $post_image = $_FILES['post_image']['name'];
//   $post_image_temp = $_FILES['post_image']['tmp_name'];
   
   $user_role = $_POST['role'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
//   $post_date = date('d-m-y');
   
   
//   move_uploaded_file($post_image_temp, "../images/$post_image");
   
   $query = "UPDATE users SET ";
   $query .= "user_firstname = '{$user_firstname}', ";
   $query .= "user_lastname = '{$user_lastname}', ";
   $query .= "role = '{$user_role}', ";
   $query .= "user_name = '{$user_name}', ";
   $query .= "user_email = '{$user_email}', ";
   $query .= "user_password = '{$user_password}' ";
   $query .= "WHERE user_id = {$the_user_id}";
   
   $update_user = mysqli_query($connection, $query);
   
   confirm($update_user);
}


?>
  

  
  
  
  
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
      <label for="user_firstname">Firstname</label>
      <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
   </div>
   <div class="form-group">
      <label for="user_lastname">Lastname</label>
      <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
   </div>
   <div class="form-group">
      <label for="role">User role</label><br>
      <select class="" name="role" id="">
        <option value="subscriber"><?php echo $user_role ?></option>
         <?php 
         if($user_role == 'admin'){
            echo "<option value='subscriber'>subscriber</option>";
         } else {
            echo "<option value='admin'>sdmin</option>";
         }
         
         
         
         ?>
      </select>
   </div>
   
<!--
   <div class="form-group">
      <label for="post_image"></label>
      <input type="file" class="form-control" name="post_image">
   </div>
-->
   <div class="form-group">
      <label for="user_name">Username</label>
      <input type="text" value="<?php echo $user_name; ?>" class="form-control" name="user_name">
   </div>
   <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
   </div>
   <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
   </div>
   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
   </div>

</form>