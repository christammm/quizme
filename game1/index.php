<?php include "../includes/header.php";?>
<?php include "navigation_game.php";?>

<html>
<head>
  <title>GeneralGame</title>
  <link rel = "stylesheet" type = "text/css" href ="styles.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    var data = <?php echo $_SESSION['gameset']; ?>;
    //var questions = JSON.parse(data);
    
    ///
    function shuffle(array) {
      var currentIndex = array.length, temporaryValue, randomIndex;

      // While there remain elements to shuffle...
      while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
  }

  return array;
}
    
    shuffle(data);
    
    
    </script>
  <script src = "script.js"></script>
<script type="text/javascript">
   
    </script>
</head>
<body style="background-color:black;">

<div class="container">
    
  <div class="row">
      <div class="col-md-12" style="margin-left:15%;">
  <!-- multiple canvas's to limit (multiple) rendering  -->

  <canvas id = "backgroundCanvas" width = "550" height = "600"></canvas>
  <!--
  <script>
  var c=document.getElementById("backgroundCanvas");
  var ctx=c.getContext("2d");
  ctx.font="25px Arial";
  ctx.fillText("What is 1+1?",50,150);

  </script>
-->
  <canvas id = "playerCanvas" width = "550" height = "600"></canvas>
  <canvas id = "enemiesCanvas" width = "550" height = "600"></canvas>
  <canvas id = "questionCanvas" width = "550" height = "600">
  </canvas>
  <canvas id = "questionBackCanvas" width = "550" height = "601">
  </canvas>

  <button id="reset" style="background-color:green;"class="btn btn-primary"> Next Question</button>
  <button id="resEn" style="background-color:red;"class="btn btn-primary"> Reset Game</button>
    
    </br>
    

  <!-- <input id = "resButt" type="button" style="z-index:2; position: absolute; top: 500; left: 600" value= "Reset Game"/> -->
    </div>

    </div>
    
    <div class="row">
        <div class="col-md-12" style="margin-top:600px;">
            <a class="btn btn-primary" href="../gameinfo.php" style="margin-left:15%;">Click here to go back</a>
	    
        </div>
    </div>
        
    </div>
</body>
</html>
