<html lang="en">
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="desdcription" content="">
    <meta name="author" content="">

    <title>QuizMe</title>
<style>
    nav{
        font-family: 'Open Sans', sans-serif !important;
        color:white !important;
    }
    
    .row.row-2.foo.bar{
        
        color:white;
    }
    
    nav ul li a{
        color:white;
    }
    
    logged-in:hover{
        background-color:#009933;

        
    }
    
    .footer{
    bottom: 0;
    width: 100%;

    color:black;
    }
    .container{
        font-family: 'Roboto', sans-serif;
    }
</style>

    <!-- Latest compiled and minified CSS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
