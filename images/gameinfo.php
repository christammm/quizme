<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="thumbnail">
                <?php
                
                if($_GET['game'] == 1){
                echo "<img src = 'images/game1.png'>";
                }elseif($_GET['game'] == 2){
                echo "<img src = 'images/game2.png'>";
                }elseif($_GET['game'] == 3 ){
                echo "<img src = 'images/game3.png'>";
                }
                    ?>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Choice Invaders</h3>
            <p>This goal of this game is similar to the retro title Galaga. Defeat the correct aliens before they get to you! You must use a test set to play this game! Otherwise the game will not run properly!</p>
            <?php 
                function redirect($url)
                {
                   header('Location: ' . $url);
                   die();
                }
//            
//                <h3>Game 1</h3>
//            <p>This game is about shooting stuff. You need help.</p>
            
            if(isset($_POST['submit'])){
                
                $query = "SELECT * FROM questions WHERE set_id = {$_POST['setname']}";
                
                $queryResults = mysqli_query($connection,$query);
            
                $questions = array();
                while($row=mysqli_fetch_assoc($queryResults)) { 
                    $questions[] = $row;
                } 

                $json_string = json_encode($questions);

                echo $json_string;

                $_SESSION['gameset'] = $json_string;
                echo "<br>";
                echo  $_SESSION['gameset'];
    
                redirect("game1/index.php?set_id={$_POST['setname']}");
    
     //header( 'Location: http://www.yoursite.com/new_page.html' ) 
    
} ?>
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="number" name="setname">
                </div>
                
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" name="submit">
                </div>
            </form> 
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-md-6">
            <h3> Check For Test Set ID</h3>
            <p> Use this row to check for the Test ID you would like to use</p>
        </div>
        
        <div class="col-md-6">
                <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="number" name="checksetname">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" value="Search for Test" name="checksubmit">
                </div>
            </form> 
        </div>
    </div>
    
    <hr>
    <!-- ROW THAT DISPLAYS THE SET DESCRIPTION AND WHO CREATED IT -->
    <div class="row">
        <table class="table table-bordered table-hover">
            
            <?php if(isset($_POST['checksubmit'])){
                echo "<thead>
                <tr>
                    <th>Set ID</th>
                    <th>Set Name</th>
                    <th>Set Description</th>
                    <th>Date Created</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>";
                $check_test_name = $_POST['checksetname'];
                $query = "SELECT * FROM setlist WHERE set_id = {$check_test_name}";
                $result = mysqli_query($connection,$query);

                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>";
                    $set_id = $row['set_id'];
                    $set_name = $row['setname'];
                    $set_description = $row['setdescription'];
                    $date_created = $row['datecreated'];
                    $username = $row['username'];
                    echo "<td>{$set_id}</td>";
                    echo "<td>{$set_name}</td>";
                    echo "<td>{$set_description}</td>";
                    echo "<td>{$date_created}</td>";
                    echo "<td>{$username}</td>";
                    echo "</tr>";
            } ?>
            </tbody>
        </table>
    </div>
    
    <!-- DISPLAYS THE LIST OF QUESTIONS THAT ARE CONTAINED WITHIN THE SET -->
    <div class="row">
        <table class="table table-bordered table-hover">
            
                <?php 
                if(isset($_POST['checksubmit'])){
                echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>1st Choice</th>
                    <th>2nd Choice</th>
                    <th>3rd Choice</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>";
                $check_test_name = $_POST['checksetname'];
                $query = "SELECT * FROM questions WHERE set_id = {$check_test_name}";
                $result = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                $question_id = $row['id'];
                $question = $row['question'];
                $choice1 = $row['choice1'];
                $choice2 = $row['choice2'];
                $choice3 = $row['choice3'];
                $choice4 = $row['choice4'];
                echo "<td>{$question_id}</td>";
                echo "<td>{$question}</td>";
                echo "<td>{$choice1}</td>";
                echo "<td>{$choice2}</td>";
                echo "<td>{$choice3}</td>";
                echo "<td>{$choice4}</td>";
                echo "</tr>";
                
                }
                }
                ?>
                
            </tbody>
        </table>   
    </div>
        
</div>
    
    
    