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
                    
                        <h1>Posts</h1>
                        <hr>
                        
                        <?php
                            
                        if(isset($_GET['source'])){
                            
                            $source = $_GET['source'];
                        } else {
                            $source='';
                        }
                        
                        switch($source){
                                
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case '100':
                                echo "NICE 100;";
                                break;
                            case '200':
                                echo "NICE 200;";
                                break;
                            default:
                                include "includes/view_all_posts.php";
                                break;
                        }
                        
                        ?>
                        
                        
                        
                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>