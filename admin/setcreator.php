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
                
                        
                        
                        <h1 class="page-header">
                            Your Question Sets
                        </h1>
                        
                        <!-- Question Row --->
                        <div class="row">
                        <div class="col-xs-12">
                            <?php add_setList(); ?>
                        <form action="" method="post">
                            <label for="cat-title">Set Name</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="setname">
                            </div>
                            <label for="cat-title">Description</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="setdescription">
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
                        $query = "SELECT * FROM setlist WHERE username = '{$_SESSION['username']}'";
                        $select_setList_query = mysqli_query($connection, $query);
                        ?>
        
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Set ID</th>
                                        <th>Set Name</th>
                                        <th>Set Description</th>
                                        <th>Date Created</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php         

                                    while($row = mysqli_fetch_assoc($select_setList_query)){
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
                                    echo "<td><a href='setcreator.php?delete={$set_id}'>Delete</a></td>";
                                    echo "<td><a href='questions.php?setid={$set_id}'>Edit Questions</a></td>";
                                    echo "<td><a href='setcreator.php?export={$set_id}'>Export to JSON</a></td>";
                                    echo "</tr>";
                                    }
                                    //echo" <tr><td>List ended!!
                                    ///Username = {$_SESSION['username']} 
                                    ///</td></tr>";
                            
                                    
                                    //DELETE CATEGORY FROM ID
                                    if((isset($_GET['delete']))){
                                        
                                        $delete_set_id = $_GET['delete'];
                                        
                                        $query = "DELETE FROM setlist WHERE set_id = {$delete_set_id} ";
                                        $delete_id_query = mysqli_query($connection, $query);
                                        $query = "DELETE FROM questions WHERE set_id = {$delete_set_id} ";
                                        $delete_id_query = mysqli_query($connection, $query);
                                        header("Location: setcreator.php");
                                    }
                                    
                                    if((isset($_GET['setid']))){
                                        
                                        $_SESSION['setid'] = $set_id;
                                    }
                                    
                                    if((isset($_GET['success']))){
                                        echo "Export successful!";
                                    }
                                    
                                    
                                    //EXPORT TEST TO JSON FILE
                                    if(isset($_GET['export'])){
                                        $export_set_id = $_GET['export'];
                                        
                                        $query = "SELECT * FROM questions WHERE set_id = {$export_set_id} ";
                                        $export_id_query = mysqli_query($connection, $query);
                                        
                                        $testarray = array();
                                        while($row =mysqli_fetch_assoc($export_id_query))
                                        {
                                            $testarray[] = $row;
                                        }
                                        echo json_encode($testarray);
                                        $my_file = 'tmp_test.json';
                                        $fp = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
                                        fwrite($fp, json_encode($testarray));
                                        fclose($fp);

                                
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