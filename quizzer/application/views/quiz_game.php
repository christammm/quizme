<?php include "../includes/header.php"; ?>
<?php include "navigation_game.php";?>
<!DOCTYPE html>


<div id="container">
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

            $_SESSION['set_id'] = $_GET['set_id'];
        }
    
        
    ?>

    <div class="row">
        <div class="col-md-12" style="border:.5px solid gray; border-radius:10px; text-align:center;">
        <h4>Test Name:<?php echo $setname;?></h4>
        <h4>Description:<?php echo $setdescription;?></h4>
        <h4>Created By:<?php echo $setcreator;?></h4>
        <h4> You are taking the test as: <?php echo $_SESSION['username']?></h4>
            
            
            <form method="" action="<?php echo base_url();?>index.php/Questions/quizdisplay">

    <div class="form-group">
  <input class="btn btn-primary" type="submit" value="Start">
        <a class="btn btn-primary" href="/~tamc1/quizme_ver_1/gameinfo.php?game=3";?>Go Back</a>
        </div>
  
 </form> 
        </div>
    </div>





</div>
<?php include "../includes/footer.php"; ?>