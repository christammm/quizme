<?php include "../includes/header.php";?>
<?php include "navigation_game.php";?>

<?php
    $number = (int) $_GET['n'];

    /*
    */
    $_SESSION['score'] == 0;

    if(isset($_POST['submit'])){
        $number =
    }

?>

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
        <h4>Test Name:<?php echo $setname;?></h4>
        <h4>Description:<?php echo $setdescription;?></h4>
        <h4>Created By:<?php echo $setcreator;?></h4>
        <h4> You are taking the test as: <?php echo $_SESSION['username']?></h4>
        </div>
    </div>
    
    
    <?php 
        $query = "SELECT * FROM questions WHERE set_id = " . $_GET['set_id'];
        $queryResult = mysqli_query($connection, $query);
        if(!$queryResult){
            die("error : " . mysqli_error($connection));
            echo "Fuck";
        }else{
            echo "Query Success!";
            shuffle($queryResult);
            echo "<form method='post'
            action='process.php'>";
            while($row = mysqli_fetch_assoc($queryResult)){
                $array = array($row['choice1'],$row['choice2'],$row['choice3'],$row['choice4']);
                shuffle($array);
                echo "<div class='row'>";
                echo "<div class='col-md-12' style='border:.5px solid gray; border- radius:10px; padding-bottom:20px;'>";
               //echo "<h4 style=''>Question  of ". count($row). " </h4>";
                echo "<h4>{$row['question']}</h4>";
                
                echo "<input name='choice' type='radio' value='{$array[0]}'/> {$array[0]}<br>";
                echo "<input name='choice' type='radio' value='{$array[1]}'/> {$array[1]}<br>";
                echo "<input name='choice' type='radio' value='{$array[2]}'/> {$array[2]}<br>";
                echo "<input name='choice' type='radio' value='{$array[3]}'/> {$array[3]}<br>";
            echo "</div>";
        echo "</div>";
            }
            echo "<input type='submit' name='submit' value='submit' />";
            echo "</form>";
        }
    
    ?>
<!---
    <div class="row">
         <div class="col-md-12" style="border:.5px solid gray; border-radius:10px; text-align:center;">
        <h4 style="">Question 1 of 5</h4>
        <h4>What is the capital of China?</h4>
        <ul class="choices" style="list-style-type: none;margin-left:-35px;">
            <li><input name="choice1" type="radio" value="0"/>Hong Kong</li>
            <li><input name="choice2" type="radio" value="1"/>Shanghai</li>
            <li><input name="choice3" type="radio" value="2"/>Beijing</li>
            <li><input name="choice4" type="radio" value="3"/>Shenzhen</li>
        </ul>
        </div>
    </div>
    
     <div class="row">
         <div class="col-md-12" style="border:.5px solid gray; border-radius:10px;">
        <h4 style="">Question 1 of 5</h4>
        <h4>What is the capital of China?</h4>
        <ul class="choices" style="list-style-type: none;margin-left:-35px;">
            <li><input name="choice1" type="radio" value="0"/>Hong Kong</li>
            <li><input name="choice2" type="radio" value="1"/>Shanghai</li>
            <li><input name="choice3" type="radio" value="2"/>Beijing</li>
            <li><input name="choice4" type="radio" value="3"/>Shenzhen</li>
        </ul>
        </div>d
    </div>
    
    
     <div class="row">
         <div class="col-md-12" style="border:.5px solid gray; border-radius:10px;">
        <h4 style="">Question 1 of 5</h4>
        <h4>What is the capital of China?</h4>
        <ul class="choices" style="list-style-type: none;margin-left:-35px;">
            <li><input name="choice1" type="radio" value="0"/>Hong Kong</li>
            <li><input name="choice2" type="radio" value="1"/>Shanghai</li>
            <li><input name="choice3" type="radio" value="2"/>Beijing</li>
            <li><input name="choice4" type="radio" value="3"/>Shenzhen</li>
        </ul>
        </div>
    </div>
    
    <div class="row">
    
    </div>
-->
<?php include "../includes/footer.php"; ?>
