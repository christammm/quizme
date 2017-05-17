<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" style="background-image: url('images/homepage-jumbo.jpg');">
            <h1 style= "color:white;">Welcome <?php echo $_SESSION['firstname'];?></h1>
            <p style= "color:white;">Thank you for trying out QuizMe! We really hope you enjoy this demo and feel free to give us any thoughts or opinions!</p>
            <p><a class="btn btn-primary btn-large">Contact Us</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images/game1.png" alt="game">
                    <div class="caption">
                        <h3>Choice Invaders</h3>
                        <p>Shoot Aliens to get Answers Right!</p>
                        <p>
                            <a href="gameinfo.php?game=1" class="btn btn-default">Play Now</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Game 2</h3>
                        <p>Coming Soon!</p>
                        <p>
                            <a href="gameinfo.php?game=2" class="btn btn-default">Play Now</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images/game3.png" alt="game3">
                    <div class="caption">
                        <h3>Choice Quiz</h3>
                        <p>Take an actual Multiple choice Quiz if you dare</p>
                        <p>
                            <a href="gameinfo.php?game=3" class="btn btn-default">Play Now</a>
                        </p>
                    </div>
                </div>
            </div>

           

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



