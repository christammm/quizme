<?php include "includes/header.php"; ?> 

    <div id="wrapper">
        
        <?php if($connection) echo "connected";
               else echo "Failed";?>

        
        <!--Navigation -->
        <?php include "includes/navigation.php"; ?>        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                
                        <?php
                            if($_GET['setid']){
                            $_SESSION['setid'] = $_GET['setid'];
                            }
                        ?>
                        
                        
                        <h1 class="page-header">
                            Question Set  <?php echo $_SESSION['setid']; ?>
                        </h1>
                        
                        <!-- Question Row --->
                        <div class="row">
                        <div class="col-xs-12">
                            <?php add_questions(); ?>
                        <form action="" method="post">
                            <label for="cat-title">Add Question</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="question">
                            </div>
                        </div>
                        </div>
                            
                        <!-- Answers Row -->
                        <div class="row">
                        <div class="col-xs-3">
                        
                            <label for="choice1">Choice 1</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice1">
                            </div>
                        </div>
                        <div class="col-xs-3">
                        
                            <label for="choice2">Choice 2</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice2">
                            </div>
                        </div>
                        <div class="col-xs-3">
                        
                            <label for="choice3">Choice 3</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice3">
                            </div>
                        </div>
                        <div class="col-xs-3">
                        
                            <label for="choice4">Choice 4</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="choice4">
                            </div>
                        </div>    
                                      
                        </div>
                            
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value = "Submit">
                            </div>
                        
                        </form>
                            
                            
                        </div>
                    </div>
                           <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_questions.php";
                            }
                            
                            ?>
                
                        <div class="col-xs-12">
                            
                                    <?php 
                        //QUERY TO FIND ALL CATEGORIES
                            if(!isset($_SESSION['setid'])){ echo "Shits empty :(";}
                        $query = "SELECT * FROM questions WHERE set_id  = '{$_SESSION['setid']}' ";
                        $select_questions_query = mysqli_query($connection, $query);

                        ?>
        
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>1st Choice</th>
                                        <th>2nd Choice</th>
                                        <th>3rd Choice</th>
                                        <th>4th Choice(Correct)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php         

                                    while($row = mysqli_fetch_assoc($select_questions_query)){
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
                                    echo "<td><a href='questions.php?delete={$question_id}&setid={$_GET['setid']}'>Delete</a></td>";
                                    echo "<td><a href='questions.php?edit={$question_id}&setid={$_GET['setid']}'>Edit</a></td>";
                                    echo "</tr>";
                                    }
                            
                                    
                                    //DELETE CATEGORY FROM ID
                                    if((isset($_GET['delete']))){
                                        
                                        $delete_question_id = $_GET['delete'];
                                        
                                        $query = "DELETE FROM questions WHERE id = {$delete_question_id} ";
                                        $delete_id_query = mysqli_query($connection, $query);
                                        header("Location: questions.php?setid={$_SESSION['setid']}");
                                    }
                                    
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                           
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>