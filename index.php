<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnswerMii</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">


    <style>
        #row-1-box{
            text-align:center;

        }

        .jumbotron{
            background-size:cover;
            background-image:url('images/section2.jpg');
            color:white;
            position: relative;
            height:100%;
            padding-top: 200px;
            padding-bottom:200px;
            margin-top:-40px;


        }


        .jumbotext{
            padding:50px 50px 50px 50px;
            color:white !important;
        }
        .row-icon{
            height:20%;
            align-content:center;
        }

        body{
            font-family:"Helvetica";
            background-color:#f5f5f5;

        }

        p{
            font-size: 16px;
        }

        hr{
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }

        .row-2{

            padding-left:10px;
            padding-right:10px;
            padding-top:40px;
            padding-bottom:40px;

            line-height:2em;
        }

        .text-box-1{
            padding-top:40px;
        }
    </style>
    </head>
    <body>

<?php include "includes/navigation.php";?>
        
        



        <div class="jumbotron">
            <div  class="container">
         <div class="row-fluid row row-2 foo bar jumbotron">
                <div class="col-md-6">

                    <h1 style="padding-top:60px;">Introducing a New Way to Study</h1>
                    <p>Thanks to the bright minds at Riveratam, QuizME is not only a website just to take quizzes and tests. Our developers have strategically create games which adjust to your test, so that you can take your tests while playing games! To ensure quality assurance purpose, we advise you to ask your teacher or administrator for help on how to use Quiz Me </p>
                    <br>
                    <a class="btn btn-primary btn-lg" href="register.php" role="button">Try for Free</a>
                </div>

                <div class="col-md-6">
                    <img style="padding-left:40px;align-content:center;" src="images/game1-preview.png" class="img-responsive">
                </div>
            </div>
            </div>
        </div>
     

<?php include "includes/footer.php" ?>
