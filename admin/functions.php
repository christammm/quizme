<?php include_once('includes/passwordLib.php');?>
<?php

    function redirect($url)
{
   header('Location: ' . $url);
   die();
}


    //INSERTS CATEGORIES INTO THE TABLE IN THE CATEGORIES PAGE
    function insert_categories(){
        
        global $connection;
        
        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title)){
                echo "This field shouldn't be empty";
            } else{

            //create query to create username and password into database
              $query = "INSERT INTO categories(cat_title)";
              $query .= "VALUES ('$cat_title')";

              //submit query to database
              $create_category_query = mysqli_query($connection, $query);
              if(!$create_category_query){
                  die('Query FAILED' . mysqli_error($connection));
              }else {
                echo "Record created!!!!!";
              }
            }
        }

    }



//Confirms whether query has been successfull

    function confirmQuery($result){
        
        global $connection;
        
        if(!$result){
            die("QUERY FAILED" . mysqli_error($connection)); 
        }
        
    }

    function add_questions(){
        
        global $connection;
        
        if(isset($_POST['submit'])){
            
            $set_id = $_SESSION['setid'];
            $question = $_POST['question'];
            $choice1 = $_POST['choice1'];
            $choice2 = $_POST['choice2'];
            $choice3 = $_POST['choice3'];
            $choice4 = $_POST['choice4'];


            if($question == "" || empty($question)){
                echo "This field shouldn't be empty";
            } else{

            //create query to create username and password into database
              $query = "INSERT INTO questions(set_id, question, choice1, choice2, choice3, choice4)";
              $query .= "VALUES ('$set_id','$question','$choice1','$choice2','$choice3','$choice4')";

              //submit query to database
              $create_question_query = mysqli_query($connection, $query);
              if(!$create_question_query){
                  die('Query FAILEDdasklfjdskldjds' . mysqli_error($connection));
              }else {
                echo "Record created!!!!!";
              }
            }
        }
    }

    // Function to add new Question set created and provided by the administrator, or teacher.

     function add_setList(){
        
        global $connection;
        
        if(isset($_POST['submit'])){
            
            $set_name = $_POST['setname'];
            $description = $_POST['setdescription'];
            $username = $_SESSION['username'];


            if($set_name == "" || empty($set_name)){
                echo "This field shouldn't be empty";
            } else{

            //create query to create username and password into database
              $query = "INSERT INTO setlist(setname, setdescription,datecreated,username)";
              $query .= "VALUES ('$set_name','$description',CURDATE(),'$username')";

              //submit query to database
              $create_question_query = mysqli_query($connection, $query);
              if(!$create_question_query){
                  die('Query FAILEDdasklfjdskldjds' . mysqli_error($connection));
              }else {
                echo "Set created!!!!!";
              }
            }
        }
    }

function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}

function username_exists($username){

    global $connection;


    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}

function register_user($username, $email, $password, $firstname, $lastname){

    global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
	$firstname = mysqli_real_escape_string($connection, $firstname);
	$lastname = mysqli_real_escape_string($connection, $lastname);
        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
	//$password = mysqli_real_escape_string($connection, $password);

      	$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
             
      	$query .= "VALUES('{$firstname}','{$lastname}','student','{$username}','{$email}', '{$password}') "; 
        $register_user_query = mysqli_query($connection, $query);

        confirmQuery($register_user_query);

        



}

 function login_user($username, $password){

    global $connection;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query) {

        die("QUERY FAILED". mysqli_error($connection));

    }
    
    
    
      while($row = mysqli_fetch_array($select_user_query)) {
          
          $db_user_id = $row['user_id'];
          $db_username = $row['username'];
          $db_user_password = $row['user_password'];
          $db_user_firstname = $row['user_firstname'];
          $db_user_lastname = $row['user_lastname'];
          $db_user_role = $row['user_role'];
      
      } 


    if (password_verify($password,$db_user_password)) {
           
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
            
            

        redirect("homepage.php");


        } else {




        redirect("login_page.php");

        }
        


 }





?>