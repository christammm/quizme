<form action="" method="post">

                            <label for="Question">Edit Question</label>
                            <?php
        
                                //find all categories
                                if(isset($_GET['edit']))
                                {
                                
                                    $question_id = $_GET['edit'];
                                    
                                    
                                //QUERY TO FIND ALL CATEGORIES
                                $query = "SELECT * FROM testbankbeta WHERE id= {$question_id}";
                                $select_questions_query = mysqli_query($connection, $query);
                                    
                                while($row = mysqli_fetch_assoc($select_questions_query)){
                                    $question_id = $row['id'];
                                    $question = $row['question'];
                                    $choice1 = $row['choice1'];
                                    $choice2 = $row['choice2'];
                                    $choice3 = $row['choice3'];
                                    $choice4 = $row['choice4'];
                                    
                            
                            
                            ?>
    
                        <div class="row">
                        <div class="col-xs-12">
                        <form action="" method="post">
                            <label for="question">Question</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="question" value="<?php if(isset($question)){echo $question;} ?>">
                            </div>
                        </div>
                        </div>
                            
                        <!-- Answers Row -->
                        <div class="row">
                        <div class="col-xs-3">
                            <label for="choice1">Choice 1</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice1" value="<?php if(isset($choice1)){echo $choice1;} ?>">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label for="choice2">Choice 2</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice2" value="<?php if(isset($choice2)){echo $choice2;} ?>">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label for="choice3">Choice 3</label>
                            <div class="form-group">
                               <input class="form-control" type="text" name="choice3" value="<?php if(isset($choice3)){echo $choice3;} ?>">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label for="choice4">Choice 4</label>
                            <div class="form-group">
                               <input class="form-control" type="text" name="choice4" value="<?php if(isset($choice4)){echo $choice4;} ?>">
                            </div>
                        </div>    
                                      
                        </div>        

    
    
    
    
    
                            
                            <?php }} ?>
    
                                <?php  /////////////UPDATE QUERY
                                if(isset($_POST['update_question'])){
                                    $new_question = $_POST['question'];
                                    $new_choice1 = $_POST['choice1'];
                                    $new_choice2 = $_POST['choice2'];
                                    $new_choice3 = $_POST['choice3'];
                                    $new_choice4 = $_POST['choice4'];
                                    
                                    
                                    $query = "UPDATE testbankbeta SET question = '{$new_question}'
                                    , choice1 = '{$new_choice1}'
                                    , choice2 = '{$new_choice2}'
                                    , choice3 = '{$new_choice3}'
                                    , choice4 = '{$new_choice4}' WHERE id = {$question_id} ";
                                    $update_query = mysqli_query($connection, $query);
                                        if(!$update_query){
                                            die("Query Failed". mysqli_error($connection));
                                        } else{
                                             header("Location: questions.php?setid={$_SESSION['setid']}");
                                             echo "Sucessfully updated!!";
                                        }
                                }
                            
                            ?>
                            
                            
                        

                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_question" value = "Update">
                            </div>
                        </form>