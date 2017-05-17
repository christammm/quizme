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
                            Admin Panel
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                            <?php insert_categories();?>
                        <form action="" method="post">
                            <label for="cat-title">Add Category</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value = "Add Category">
                            </div>
                        </form>
                            
                        <!-----EDIT CATEGORIES ---->
                        <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                            }
                            
                            ?>
                            
                        
                        </div>
                        
                        
                        <div class="col-xs-6">
                            
                        <?php 
                        //QUERY TO FIND ALL CATEGORIES
                        $query = "SELECT * FROM categories";
                        $select_categories_query = mysqli_query($connection, $query);

                        ?>
        
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php         

                                    while($row = mysqli_fetch_assoc($select_categories_query)){
                                    echo "<tr>";
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                    }
                            
                                    
                                    //DELETE CATEGORY FROM ID
                                    if((isset($_GET['delete']))){
                                        
                                        $delete_cat_id = $_GET['delete'];
                                        
                                        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
                                        $delete_id_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                    
                                    ?>
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