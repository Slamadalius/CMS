<?php 
if(isset($_POST['create_user'])){   
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
   
   $query = "INSERT INTO users(user_firstname, user_lastname, user_name, role, user_email, user_password)";
   
   $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_name}','{$user_role}','{$user_email}','{$user_password}')";
   
   $create_user_query = mysqli_query($connection, $query);
   
   confirm($create_user_query);
   
   echo "User Created Succesfully. Redirecting...";
   header("refresh:3;url=users.php");
}


?>
  

  
  
  
  
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
      <label for="user_firstname">Firstname</label>
      <input type="text" class="form-control" name="user_firstname">
   </div>
   <div class="form-group">
      <label for="user_lastname">Lastname</label>
      <input type="text" class="form-control" name="user_lastname">
   </div>
   <div class="form-group">
      <label for="role">User role</label><br>
      <select class="" name="role" id="">
         <option value="admin">Admin</option>
         <option value="subscriber">Subscriber</option>
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
      <input type="text" class="form-control" name="user_name">
   </div>
   <div class="form-group">
      <label for="user_email">Email</label>
      <input type="email" class="form-control" name="user_email">
   </div>
   <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" name="user_password">
   </div>
   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
   </div>

</form>