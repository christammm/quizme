<?php 
    include "functions.php";


    if(isset($_POST['submit'])){
       
            $checker = array($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['password'],$_POST['email']);
            if(checkAllFields($checker) == false){
                echo "<p style='color:red;'> All fields should not be empty. </p>";
            }else{
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $user_role = 'subscriber';
                
                      $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
             
                      $query .= "VALUES('{$firstname}','{$lastname}','{$user_role}','{$username}','{$email}', '{$password}') "; 
             
                      $create_user_query = mysqli_query($connection, $query);  

                      confirmQuery($create_user_query);

                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $password;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['user_role'] = $user_role;
                header("Location: ../homepage.php");

            }
            
        }
        
        
    
?>