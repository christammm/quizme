<?php include "../includes/header.php";?>
<?php include "navigation_game.php";?>

<html>
<head>
  <title>GeneralGame</title>
  <link rel = "stylesheet" type = "text/css" href ="styles.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body style="">
    
    <?php 
    
        $nuQuery = "SELECT * FROM setlist WHERE set_id = ". $_GET['set_id'];
        $resultquiz = mysqli_query($connection, $nuQuery);
        
        if(!$resultquiz){
            die("error : " . mysqli_error($connection));
          
        }else{
           
            $row = mysqli_fetch_assoc($resultquiz);
            $setname = $row['setname'];
            $setdescription = $row['setdescription'];
            $setcreator = $row['username'];

            
        }
    ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="border:.5px solid gray; border-radius:10px; text-align:center;">
        <h1>Results:</h1>
        <h4>Test Name:<?php echo $setname;?></h4>
        <h4>Description:<?php echo $setdescription;?></h4>
        <h4>Created By:<?php echo $setcreator;?></h4>
        <h4> You are taking the test as: <?php echo $_SESSION['username']?></h4>
        <h3>Score : 5 out of 5 </h3>
        </div>
    </div>

    
    
<?php include "../includes/footer.php"; ?>
