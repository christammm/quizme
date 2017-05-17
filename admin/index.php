<?php include "includes/header.php"; ?>

    <div id="wrapper">

        
        <!--Navigation -->
        <?php include "includes/navigation.php"; ?>        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        
                        <h1 class="page-header">
                            Welcome to Admin
                            <?php echo $_SESSION['username'];?>
                        </h1>
                           
                    </div>
                </div>
                
                
                 <!-- /.row -->
                
       
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      
                      <?php 

                        $query = "SELECT * FROM posts";
                        $select_all_post = mysqli_query($connection,$query);
                        $post_count = mysqli_num_rows($select_all_post);

                      echo  "<div class='huge'>{$post_count}</div>"

                        ?>


                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                      <?php 

                                    $query = "SELECT * FROM questions";
                                    $select_all_questions = mysqli_query($connection,$query);
                                    $question_count = mysqli_num_rows($select_all_questions);

                                  echo  "<div class='huge'>{$question_count}</div>";

                                    ?>


           
                                      <div>Questions</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                       <?php 

                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection,$query);
                                        $user_count = mysqli_num_rows($select_all_users);

                                      echo  "<div class='huge'>{$user_count}</div>"

                                        ?>

                                       
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <?php 

                                    $query = "SELECT * FROM setlist";
                                    $select_all_setlists = mysqli_query($connection,$query);
                                    $setlist_count = mysqli_num_rows($select_all_setlists);

                                  echo  "<div class='huge'>{$setlist_count}</div>"

                                    ?>

                                   <div>Setlists Created</div>
                                    </div>
                                </div>
                            </div>
                            <a href="setcreator.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                
                
                
                
                
            <!-- New Row -->
                
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Recent Players</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Set Name</th>
                                                <th>Username</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT * FROM highscores";
                                                $query .=" ORDER BY id DESC ";
                                                $hsquery = mysqli_query($connection, $query);
                                                if(!$hsquery){
                                                    die("Error" . mysqli_error());
                                                }else
                                                {
                                                    $index = 0;
                                                    while($index < 9){
                                                        $row = mysqli_fetch_assoc($hsquery);
                                                        $query = "SELECT * FROM setlist WHERE set_id=".$row['setid'];
                                                        $namequery = mysqli_query($connection, $query);
                                                        $name = mysqli_fetch_assoc($namequery);
                                                        echo "<tr>
                                                                <td>{$row['date']}</td>
                                                                <td>{$name['setname']}</td>
                                                                <td>{$row['username']}</td>
                                                                <td>{$row['score']}</td>
                                                            </tr>";
                                                        $index++;
                                                    }
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">See All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
            <!-- /.row -->
                
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>