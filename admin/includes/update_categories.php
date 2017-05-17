<form action="" method="post">

                            <label for="cat-title">Edit Category</label>
                            <?php
        
                                //find all categories
                                if(isset($_GET['edit']))
                                {
                                
                                    $cat_id = $_GET['edit'];
                                    
                                    
                                //QUERY TO FIND ALL CATEGORIES
                                $query = "SELECT * FROM categories WHERE cat_id= {$cat_id}";
                                $select_categories_query = mysqli_query($connection, $query);
                                    
                                while($row = mysqli_fetch_assoc($select_categories_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                
                            
                            
                            ?>
                            <div class="form-group">
                             <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
                             </div>
                            
                            <?php }} ?>
    
                                <?php  /////////////UPDATE QUERY
                                if(isset($_POST['update_category'])){
                                    $new_cat_title = $_POST['cat_title'];
                                    
                                    $query = "UPDATE categories SET cat_title = '{$new_cat_title}' WHERE cat_id = {$cat_id} ";
                                    $update_query = mysqli_query($connection, $query);
                                        if(!$update_query){
                                            die("Query Failed". mysqli_error($connection));
                                        } else{
                                        }
                                }
                            
                            ?>
                            
                            
                        

                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value = "Update">
                            </div>
                        </form>