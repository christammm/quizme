<?php include "db.php" ?>
<?php include "header.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">QUIZME</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">

            <!--


                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                  $cat_title = $row['cat_title'];
                  echo "<li><a href='#'>{$cat_title}</a></li>";
                }

                -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="admin">Admin</a>
                </li>

<!--
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
-->
                    <form id="signin" class="navbar-form navbar-right" role="form" action="includes/login.php" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" class="form-control" name="username" value="" placeholder="Username" type="username">                                        
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" class="form-control" name="password" value="" placeholder="Password" type="password">                                        
                        </div>
                        
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                   </form>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
