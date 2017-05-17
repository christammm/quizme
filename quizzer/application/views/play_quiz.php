<?php include "../includes/header.php"; ?>
<?php include "navigation_game.php"; ?>
 <?php
    
        $nuQuery = "SELECT * FROM setlist WHERE set_id = " . $_SESSION['set_id'];
        $resultquiz = mysqli_query($connection, $nuQuery);
        
        if(!$resultquiz){
            die("error : " . mysqli_error($connection));
          
        }else{
           
            $row = mysqli_fetch_assoc($resultquiz);
            $setname = $row['setname'];
            $setdescription = $row['setdescription'];
            $setcreator = $row['username'];
            $_SESSION['set_id'];

            
        }
    ?>

    <div class="row">
        <div class="col-md-12" style="border:.5px solid gray; border-radius:10px; text-align:center;">
        <h4>Test Name:<?php echo $setname;?></h4>
        <h4>Description:<?php echo $setdescription;?></h4>
        <h4>Created By:<?php echo $setcreator;?></h4>
        <h4> You are taking the test as: <?php echo $_SESSION['username']?></h4>
            
        <a class="btn btn-primary" href="/~tamc1/quizme_ver_1/gameinfo.php?game=3";?>Go Back</a>
            <br>
        </div>

        </div>

<div id="container">
    
    <form method="post" action="<?php echo base_url();?>index.php/Questions/resultdisplay">
       
    
    <?php $index = 1; 
    foreach($questions as $row) { ?>
    
    <?php $ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->choice4);
	shuffle($ans_array); ?>
    
    <div class="row">
        <div class="col-sm-12" style="border:.5px solid gray; border-radius:10px; text-align:left; padding:10px 50px 10px 50px;">
    <p><?=$index?>.<?=$row->question?></p>
    
    <input type="radio" name="quizid<?=$index?>" value="<?=$ans_array[0]?>" required> <?=$ans_array[0]?><br>
    <input type="radio" name="quizid<?=$index?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
    <input type="radio" name="quizid<?=$index?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
    <input type="radio" name="quizid<?=$index?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
            </div>
    </div>
    <?php $index = $index + 1; } ?>
    
    <br><br>
    <input class="btn btn-primary "type="submit" value="Submit!">
    
    </form>
    
</div>
<?php include "../includes/footer.php";?>