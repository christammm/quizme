
$(document).ready(function(){
 var canvas = document.getElementById("mainCanvas");

 var context = canvas.getContext("2d");
 var question = document.getElementById("questionCanvas");

 var contextQuestion = question.getContext("2d"); //we are drawing in 2d so always put 2d when setting context of canvas
 var resButt = $("#reset");
 var resEnButt = $("#resEn");
 var countQuest=0;

 var keys = [];

 var width=500, height=400, speed=4;
    
  var array = []
      array[0] = data[countQuest].choice1;
      array[1] = data[countQuest].choice2;
      array[2] = data[countQuest].choice3;
      array[3] = data[countQuest].choice4;
    
 var score = 0;

 var player = {
     x: 40,
     y: 40,
     width: 20,
     height: 20
 };

 var cube = {
     x: Math.random() * (width-20),
     y: Math.random() * (height-20),
     width: 20,
     height: 20
 }; //gives cube a random position
 var cube1 = {
     x: Math.random() * (width-20),
     y: Math.random() * (height-20),
     width: 20,
     height: 20
 }; //gives cube a random position

 var cube2 = {
     x: Math.random() * (width-20),
     y: Math.random() * (height-20),
     width: 20,
     height: 20
 }; //gives cube a random position

 var cube3 = {
     x: Math.random() * (width-20),
     y: Math.random() * (height-20),
     width: 20,
     height: 20
 }; //gives cube a random position


 window.addEventListener("keydown", function (e) {keys[e.keyCode] = true; }, false);
 window.addEventListener("keyup", function (e) {delete keys[e.keyCode]; }, false);

 /*
 keycodes for ...
 up - 38
 down - 40
 left - 37
 right - 39
 */
 
 function game() {
    
     update();
     render();

 }
    
     var array2 =[];
     array2 = shuffle(array)
    //var w=1;
//    if(w=1){
//     //questionMaker();
//     w++;
//     console.log("HEYTHERE"+w);
//    }
     // questionMaker();
    //questionMaker();
 function questionMaker(){
    
//     var array = []
//      array[0] = data[countQuest].choice1;
//      array[1] = data[countQuest].choice2;
//      array[2] = data[countQuest].choice3;
//      array[3] = data[countQuest].choice4;
      console.log(array[0]);
      console.log(array[1]);
      console.log(array[2]);
      console.log(array[3]);
      
      console.log("!!shuffled!!")
      console.log(array2[0]);
      console.log(array2[1]);
      console.log(array2[2]);
      console.log(array2[3]);
     console.log("!!FINISHshuffled!!")

     contextQuestion.font ="20px arial";
     contextQuestion.fillStyle = "white";
     contextQuestion.fillText("Question:",50,50);
     contextQuestion.fillText(data[countQuest].question,50, 85);
     contextQuestion.fillText("Choices:",50, 120);
     contextQuestion.fillText("A) "+array2[0],50, 165);
     contextQuestion.fillText("B) "+array2[1],50, 215);
     contextQuestion.fillText("C) "+array2[2],50, 265);
     contextQuestion.fillText("D) "+array2[3],50, 315);
     contextQuestion.font ="40px arial";
     contextQuestion.fillStyle = "white";
     contextQuestion.fillText("Score:",320,50);
   }
     questionMaker();
 function update() {
     
     if (keys[38])player.y-=speed;
     if (keys[40])player.y+=speed;
     if (keys[37])player.x-=speed;
     if (keys[39])player.x+=speed;

     if(player.x < 0) player.x=0; //add bound so you cant exit canvas
     if(player.y < 0) player.y=0; //add bound so you cant exit canvas
     if(player.x >= width - player.width) player.x = width - player.width; //add bound so you cant exit canvas
     if(player.y >= height - player.height) player.y = height - player.height; //add bound so you cant exit canvas

     if (collision(player,cube))process();

     if (collision(player,cube1))process();

     if (collision(player,cube2))process();

     if (collision(player,cube3))process();


 }

 function render() {
     
     context.clearRect(0,0, width, height); //add a bound for you to move with out trail (clear history of trail)
     context.fillStyle = "red";
     context.fillRect(player.x,player.y,player.width,player.height);
     context.fillStyle = "green";
     context.font = "bold 30px helvetica"; //set font size
     context.fillText("A", cube.x,cube.y+21);
     context.fillStyle = "green";
     context.font = "bold 30px helvetica"; //set font size
     context.fillText("B", cube1.x,cube1.y+21);
    context.fillStyle = "green";
    context.font = "bold 30px helvetica"; //set font size
    context.fillText("C", cube2.x,cube2.y+21);
   context.fillStyle = "green";
   context.font = "bold 30px helvetica"; //set font size
   context.fillText("D", cube3.x,cube3.y+21);

     context.fillStyle = "black";
     context.font = "bold 30px helvetica"; //set font size
     context.fillText(score, 30,30); //set score field on screen
 }

 function process(){
     score++;
     cube.x= Math.random() * (width-20);
     cube.y= Math.random() * (height-20);

     cube1.x= Math.random() * (width-20);
     cube1.y= Math.random() * (height-20);

     cube2.x= Math.random() * (width-20);
     cube2.y= Math.random() * (height-20);

     cube3.x= Math.random() * (width-20);
     cube3.y= Math.random() * (height-20);
 }

 function collision(first, second){
     return !(first.x > second.x + second.width
       || first.x+first.width < second.x
       || first.y > second.y+second.height
       || first.y + first.height < second.y );
 }

   setInterval(function() {
       game();
      
   }, 1500/15)
 });


  //30 frames per second (1000 milli second is 1 second)
