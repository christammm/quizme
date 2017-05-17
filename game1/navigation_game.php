<?php include "../includes/db.php" ?>
<?php include "../includes/header.php" ?>
<?php ob_start(); ?>

<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" style='background-color:green; color:white;'>
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="/~tamc1/quizme_ver_1/images/logo.png" height="20px"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" style="color:white;">

            <!--


                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                  $cat_title = $row['cat_title'];
                  echo "<li><a href='#'>{$cat_title}</a></li>";
                }

                -->
                <li>
		<?php
                  if(isset($_SESSION['user_role']))
                  {    
                        echo "<a href='/~tamc1/quizme_ver_1/homepage.php'>Home</a>";
                  }else{
			echo "<a href='/~tamc1/quizme_ver_1/index.php'>Home</a>";
		  }
                ?>
                    
                </li>
                <li>
                    <a href="/~tamc1/quizme_ver_1/about.php">About</a>
                </li>
                <?php
                  if(isset($_SESSION['user_role']))
                  {
                    if($_SESSION['user_role'] == "admin"){
                        echo "<li><a href='/~tamc1/quizme_ver_1/admin'>Admin</a></li>";
                    }
                  }
                ?>

<!--
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
-->
                <?php
                  if(isset($_SESSION['username']))
                  {
                    include "../includes/logged_in.php";
                  }else{
                    echo "<li><a class='' href='/~tamc1/quizme_ver_1/login_page.php'>Login</a></li>";
                    echo "<li><a class='' href='/~tamc1/quizme_ver_1/register.php'>Sign Up</a></li>";
                  }
                ?>


            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<hr>
<hr>
<br>
