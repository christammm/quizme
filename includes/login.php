<?php include "db.php"; ?>

<?php session_start(); ?>


<?php

echo $username= $_POST['username'];
echo $password= $_POST['password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE username = '{$username}' ";
$select_user_query = mysqli_query($connection, $query);
if(!$select_user_query){
    die("QUERY FAILED ." . mysqli_error($connection));

}

while($row = mysqli_fetch_array($select_user_query)){
    $db_id = $row['user_id'];
    $db_username = $row['username'];
    $db_firstname = $row['user_firstname'];
    $db_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    $db_password =  $row['user_password'];
}

if($username !== $db_username && $password !== $db_password){
    if($password !== $db_password){
    header("Location: ../login_page.php?error=true");
    echo "<span style='color:red;'>Check your input</span>";
    }
} else if($username == $db_username && $password == $db_password){
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_firstname;
    $_SESSION['lastname'] = $db_lastname;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['setid'];
    if($_SESSION[user_role] == 'admin'){
    header("Location: ../admin");
  }else{
    header("Location: ../homepage.php");
  }
    echo "<h3>Logged in Successfully! Welcome . {$_SESSION['username']}. !</h3>";

} else {
    header("Location: ../login_page.php");
    echo "<p>Login Failed :( !!</p>";
}

?>

<html>
<head>
    </head>
    <body>
    </body>
</html>
