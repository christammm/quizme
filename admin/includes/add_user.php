
<?php
   

   if(isset($_POST['create_user'])) {
   
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];
    
//            $post_image        = $_FILES['image']['name'];
//            $post_image_temp   = $_FILES['image']['tmp_name'];
    
            $username  = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            //$post_date         = date('d-m-y');

       
//        move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
      $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
             
      $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') "; 
             
      $create_user_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_user_query);

      $the_user_id = mysqli_insert_id($connection);


      echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
       


   }
    

    
    
?>

    <form action="" method="post">    
     
     
      <div class="form-group">
         <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>

     <div class="form-group">
         <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
        
     <select name="user_role" id="">
         <option value="student">Select Option</option>
         <option value="admin">Admin</option>
         <option value="student">Student</option>
         
        </select>
      
     <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
      </div>

     <div class="form-group">
         <label for="email">Email</label>
          <input type="text" class="form-control" name="user_email">
        </div>
        
    <div class="form-group">
         <label for="password">Password</label>
          <input type="password" class="form-control" name="user_password">
        </div>
        
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
      </div>


</form>


    