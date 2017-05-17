<!-- <?php include "../includes/header.php";?>
<?php include "../includes/navigation.php";?> -->

<html>
<head>
    <title>Game</title>
    <link rel = "stylesheet" tpye = "text/css" href = "styles.css" /> <!--link to styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      var data = <?php echo $_SESSION['gameset']; ?>;
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

    <body>

    <canvas id = "mainCanvas" width="500" height="400">
        <script src = "script.js"> </script> <!-- include this in canvas it links Javascript to index-->
        </canvas>
    <canvas id = "questionCanvas" width = "500" height = "400">


    </canvas>
    <button id="reset" style="background-color:green;"class="btn btn-primary"> Next Question</button>
    <button id="resEn" style="background-color:red;"class="btn btn-primary"> Reset Game</button>

    </body>
</html>
