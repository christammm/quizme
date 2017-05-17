// function clearButton(){
// $(document).ready(function(){
//
//   if(game.gameWon||game.gameOver){
//
//     game.contextQuestion.clearRect(0,0,game.width,game.height);
//     game.contextPlayer.clearRect(0,0,game.width,game.height);
//     game.contextEnemies.clearRect(game.enemies.x,game.enemies.y,game.enemies.width,game.enemies.height);
//
//     for(i in game.enemies){
//         game.contextEnemies.clearRect(game.enemies[i].x,game.enemies[i].y,game.enemies[i].width,game.enemies[i].height);
//         game.enemies.splice(i,1);
//
//       }
//       for(p in game.projectiles){
//         game.contextEnemies.clearRect(game.projectiles[p].x,game.projectiles[p].y,game.projectiles[p].width,game.projectiles[p].height);
//         game.projectiles.splice(p,1);
//       }
//     game.contextBackground.clearRect(0,0,game.width,game.height);
//     update();
//     render();
//     game.enemySpeed= 0;
//
//     game.moving=false;
//     // game.gameWon=false;
//     // game.gameOver=false;
//     //intit();
//
//     setTimeout(function(){
//       game.moving = true;
//     },1500);
//   }
//
//
// });
// };

(function startGame(){
  $(document).ready(function(){
    /////////////////////////////Create Vari ////////////////////////////////
    var resButt = $("#reset");
    var clearButt = $("#clear");
    var nexttButt = $("#nextt");
    var resEnButt = $("#resEn");
    var score = 0;
    var countQuest=0;

    var questSet = {};
        questSet.question="What is 1+1?";
        questSet.ch1="A. 1";
        questSet.ch2="B. 2";
        questSet.ch3="C. 4";
        questSet.ch4="D. 3";
        questSet.ch5=4;
      

    var game = {};
      game.stars=[];
      game.width = 550;
      game.height = 600;
    //  game.x =0;
    //  game.y=0;
      game.keys = [];
      game.enemies = [];
      game.projectiles=[];
      game.options = [];
      game.gameOver = false;
      game.gameWon = false;
      game.moving = false;
      game.bolTrue = true;
      game.winner = [];



      game.contextBackground = document.getElementById("backgroundCanvas").getContext("2d");
      game.contextPlayer = document.getElementById("playerCanvas").getContext("2d");
      game.contextEnemies = document.getElementById("enemiesCanvas").getContext("2d");
      game.contextQuestion = document.getElementById("questionCanvas").getContext("2d");
    //  game.contextButton = document.getElementById("resButt").getContext("2d");

      game.images = [];
      game.doneImages = 0;
      game.requiredImages = 0;

      game.count=24;
      game.division =48;
      game.left=false; //when true go left otherwise go right
      game.enemySpeed= 1;

      game.fullShootTimer =45;
      game.shootTimer = game.fullShootTimer;

      game.player = {
        x: game.width/2-50,
        y: game.height-110,
        width: 100,
        height: 100,
        speed: 3,
        rendered: false
      };

    $(document).keydown(function(e){
      //console.log("kydown");
      game.keys[e.keyCode ? e.keyCode : e.which] = true;
    });

    $(document).keyup(function(e){
      delete game.keys[e.keyCode ? e.keyCode : e.which];
    });

    function addBullet(){
      game.projectiles.push({
        x: game.player.x,
        y: game.player.y,
        size:20,
        image:2
      });
  }
//////////////////////////////Add Chararecters and Background stars//////////////
    function intit(){

      for(i=0; i < 600; i++){
        game.stars.push({
          x: Math.floor(Math.random()*game.width),
          y:  Math.floor(Math.random()*game.height),
          size: Math.random() * 5
        });
      }
      for(y=0; y<1; y++){
        for(x=0; x<4; x++){
         game.enemies.push({
          x: (x * 107)+30,
          y: game.height-450,
          width: 60,
          height: 70,
          image:1,
          dead: false,
          deadTime:20
          //choice: x++,
          //console.log(x)
        });
      }
      }
      loop();

      setTimeout(function(){
        game.moving = true;
      },1000);
    }

    function addStars(num){
      for(i=0; i < num; i++){
        game.stars.push({
          x: Math.floor(Math.random()*game.width),
          y: game.height + 10,
          size: Math.random() * 5
        });
      }
    }
    /*
      keyCode
      space-32
      up-38
      down-40
      left-37
      right-39

      w-87
      a-65
      s-83
      d-68
    */



    function questionMaker(){
    //console.log(countQuest);

    //var questions = JSON.parse(data);
    
    //console.log(data);
    //console.log(data[1].question);     // == Object {cid: "1234", city: "value1", district: "value2", state: "value3"} 
   // console.log(data[1].choice1);
      var array = []
      array[0] = data[countQuest].choice1;
      array[1] = data[countQuest].choice2;
      array[2] = data[countQuest].choice3;
      array[3] = data[countQuest].choice4;
      
      shuffle(array);
      game.contextQuestion.font ="20px arial";
      game.contextQuestion.fillStyle = "white";
      game.contextQuestion.fillText("Question:",50,50);
      game.contextQuestion.fillText(data[countQuest].question,50, 100);
      game.contextQuestion.fillText("Choices:",50, 200);
      game.contextQuestion.fillText("A) "+array[0],50, 250);
      game.contextQuestion.fillText("B) "+array[1],50, 300);
      game.contextQuestion.fillText("C) "+array[2],50, 350);
      game.contextQuestion.fillText("D) "+array[3],50, 400);
      game.contextQuestion.font ="40px arial";
      game.contextQuestion.fillStyle = "white";
      game.contextQuestion.fillText("Score:",380,50);
     // countQuest++;

//      nexttButt.click(function()
//      {
//        if(game.gameWon||game.gameOver)
//        {
//        console.log(countQuest);
//
//            if(data.length>=countQuest){
//            questSet.ch5=4;
//            console.log(countQuest);
//
//
//            game.contextQuestion.font ="40px arial";
//            game.contextQuestion.fillStyle = "white";
//            game.contextQuestion.fillText("Question:",50,50);
//            game.contextQuestion.fillText(data[countQuest].question,50, 100);
//            game.contextQuestion.fillText("Choices:",50, 200);
//            game.contextQuestion.fillText(data[countQuest].choice1,50, 250);
//            game.contextQuestion.fillText(data[countQuest].choice2,50, 300);
//            game.contextQuestion.fillText(data[countQuest].choice3,50, 350);
//            game.contextQuestion.fillText(data[countQuest].choice4,50, 400);
//          
//            countQuest++;
//         }
//        }
//      });
      resEnButt.click(function()
      {
       if(game.gameWon||game.gameOver){

        location.reload();
      }

        });
    clearButt.click(function()
    {
        clearCanvas();clearCanvas();clearCanvas();clearCanvas();clearCanvas();
        
        
//      if(game.gameWon||game.gameOver){
//
//        game.contextQuestion.clearRect(0,0,game.width,game.height);
//        game.contextPlayer.clearRect(0,0,game.width,game.height);
//        game.contextEnemies.clearRect(game.enemies.x,game.enemies.y,game.enemies.width,game.enemies.height);
//
//        for(i in game.enemies){
//            game.contextEnemies.clearRect(game.enemies[i].x,game.enemies[i].y,game.enemies[i].width,game.enemies[i].height);
//            game.enemies.splice(i,1);
//
//          }
//          for(p in game.projectiles){
//            game.contextEnemies.clearRect(game.projectiles[p].x,game.projectiles[p].y,game.projectiles[p].width,game.projectiles[p].height);
//            game.projectiles.splice(p,1);
//          }
//        game.contextBackground.clearRect(0,0,game.width,game.height);
//        update();
//        render();
//        game.enemySpeed= 0;
//
//        game.moving=false;
//        // game.gameWon=false;
//        // game.gameOver=false;
//        //intit();
//
//        setTimeout(function(){
//          game.moving = true;
//        },1500);
      ///}


     });
        return array;
    }//how will i assign choices to aliens
      
      
      function clearCanvas(){
          if(game.gameWon||game.gameOver){

        game.contextQuestion.clearRect(0,0,game.width,game.height);
        game.contextPlayer.clearRect(0,0,game.width,game.height);
        game.contextEnemies.clearRect(game.enemies.x,game.enemies.y,game.enemies.width,game.enemies.height);

        for(i in game.enemies){
            game.contextEnemies.clearRect(game.enemies[i].x,game.enemies[i].y,game.enemies[i].width,game.enemies[i].height);
            game.enemies.splice(i,1);

          }
          for(p in game.projectiles){
            game.contextEnemies.clearRect(game.projectiles[p].x,game.projectiles[p].y,game.projectiles[p].width,game.projectiles[p].height);
            game.projectiles.splice(p,1);
          }
        game.contextBackground.clearRect(0,0,game.width,game.height);
        update();
        render();
        game.enemySpeed= 0;

        game.moving=false;
        // game.gameWon=false;
        // game.gameOver=false;
        //intit();

        setTimeout(function(){
          game.moving = true;
        },1500);
          }
      }
      
      
    var array = questionMaker(); //potential problem is choices being bigger then the size of canvas
    console.log(array);
//////////////////////////UPDATE IF A CHANGE IN GAME HAPPENS///////////////////////
    function update(){
      addStars(.1);
      if(game.count>1000){game.count=0;}
      game.count++;
      if(game.shootTimer>0){
      game.shootTimer--;
      }
      for(i in game.stars){
        if(game.stars[i].y <= -5){
          game.stars.splice(i, 1); //(start at array i and delete 1 star)takes objects out of an array completely
        }
          game.stars[i].y--;
        }
        if(game.keys[37]||game.keys[65] ){
          if(!game.gameOver){
          if(!game.gameWon){
          if(game.player.x>0){
          game.player.x-=game.player.speed;
          game.player.rendered = false;
        }
        game.player.speed =.4;
      }
    }
      }
        if(game.keys[39]||game.keys[68]){
          if(!game.gameOver){
          if(!game.gameWon){
          if(game.player.x<=game.width-game.player.width){
          game.player.x+=game.player.speed;
          game.player.rendered = false;
        }
        game.player.speed =.4;

      }
      }
      }
      //this is a timer in game devolpment
      if(game.count % game.division == 0){
        game.left = !game.left;
      }
      for(i in game.enemies){
        if(!game.moving){
      if(game.left){
          game.enemies[i].x-=game.enemySpeed;
      }else{
        game.enemies[i].x+=game.enemySpeed;
      }
    }
      if(game.moving){
        if(!game.gameOver){
        if(!game.gameWon){
        game.enemies[i].y+=game.enemySpeed ;
      }
      game.enemySpeed =.2;
    }
  }
      if(game.enemies[i].y >= game.height-175)
      {
        game.gameOver =true;

      }
     }
     for(i in game.projectiles){
      game.projectiles[i].y-=1;
       if(game.projectiles[i].y<=-game.projectiles[i].size){
         game.projectiles.splice(i,1); //when bulllets fly offscreen they get deleted
       }

     }
     if(game.keys[32] && game.shootTimer <= 0){
       if(!game.gameOver){
       if(!game.gameWon){
       addBullet();
       game.shootTimer=game.fullShootTimer;
     }
   }
 }
     for(m in game.enemies){
       for(p in game.projectiles){
         if(collision(game.enemies[m], game.projectiles[p])){
             console.log(data[countQuest].choice4);
             console.log(array[m]);
            
           if(data[countQuest].choice4==array[m])
           {
             score++;
             game.contextQuestion.fillStyle = "white";
             game.contextQuestion.fillText(score,500,50);
             game.gameWon = true;
             console.log("winner");

             game.contextQuestion.font ="30px arial";
             game.contextQuestion.fillStyle = "yellow";
             game.contextQuestion.fillText("Answer:",50,450);
             game.contextQuestion.fillText("----------------------",50,429);
                if(array[m]==array[0]){    
             game.contextQuestion.fillText("A) "+data[countQuest].choice4,190,450);
                }
               if(array[m]==array[1]){    
             game.contextQuestion.fillText("B) "+data[countQuest].choice4,190,450);
                }
               if(array[m]==array[2]){    
             game.contextQuestion.fillText("C) "+data[countQuest].choice4,190,450);
                }
               if(array[m]==array[3]){    
             game.contextQuestion.fillText("D) "+data[countQuest].choice4,190,450);
               }
           }
             
           
           if(data.length<countQuest){ 
               game.contextBackground.clearRect(0,0,game.width*2,100);
               game.contextBackground.font ="bold 50px arial";
               game.contextBackground.fillStyle = "white";
               game.contextBackground.fillText("Game Over",game.width/2-150,100);
               
           }
        
           //console.log("collision");
           game.enemies[m].dead = true;
           game.enemies[m].image=3;
           game.contextEnemies.clearRect(game.projectiles[p].x-20,game.projectiles[p].y-20,game.projectiles[p].size,game.projectiles[p].size);
           game.projectiles.splice(p,1);
         }
       }
     }
     for(i in game.enemies){
       if(game.enemies[i].dead){
         game.enemies[i].deadTime--;
       }
       if(game.enemies[i].dead&&game.enemies[i].deadTime <= 0){
         game.contextEnemies.clearRect(game.enemies[i].x,game.enemies[i].y,game.enemies[i].width,game.enemies[i].height);
         game.enemies.splice(i,1);
       }
     }
        // countQuest++;
    }

//////////////////Render the Update/////////////////////////////////////////
    function render(){
      //game.contextQuestion.fillText(score,500,50);
      game.contextBackground.clearRect(0,0,game.width,game.height);
      game.contextBackground.fillStyle = "white";
      for(i in game.stars){
        var star = game.stars[i];
        game.contextBackground.fillRect(star.x,star.y,star.size,star.size);
      }
      if(!game.player.rendered){
        game.contextPlayer.clearRect(game.player.x-10,game.player.y,game.player.width+20,game.player.height);
        game.contextPlayer.drawImage(game.images[0],game.player.x,game.player.y,100,100);
        game.player.rendered =true;
      }
      for(i in game.enemies){
        var enemy= game.enemies[i];
        game.contextEnemies.clearRect(enemy.x-10,enemy.y-1,enemy.width+55,enemy.height);
        game.contextEnemies.drawImage(game.images[enemy.image],enemy.x,enemy.y,enemy.width,enemy.height-1);
      }
      for(i in game.projectiles){
        var proj = game.projectiles[i];
        game.contextEnemies.clearRect(proj.x,proj.y,proj.size+10,proj.size+10);
        game.contextEnemies.drawImage(game.images[proj.image],proj.x,proj.y,proj.size,proj.size);
      }
      if(!game.gameOver){
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("C",game.width/2-30,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("B",game.width/2-135,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("A",game.width/2-240,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("D",game.width/1.5-10,100);
      }
        if(!game.gameWon){
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("C",game.width/2-30,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("B",game.width/2-135,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("A",game.width/2-240,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("D",game.width/1.5-10,100);
      }
      if(game.gameOver){
        game.contextBackground.clearRect(0,0,game.width*2,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("Incorrect",game.width/2-150,100);
        game.contextQuestion.font ="30px arial";
        game.contextQuestion.fillStyle = "yellow";
        game.contextQuestion.fillText("----------------------",50,429);
        game.contextQuestion.fillText("Answer:",50,450);
//            for(m in game.enemies){
//                  if(array[m]==data[countQuest].choice4){    
//             game.contextQuestion.fillText("A) "+data[countQuest].choice4,190,450);
//                }
//               if(array[m]==data[countQuest].choice4){    
//             game.contextQuestion.fillText("B) "+data[countQuest].choice4,190,450);
//                }
//               if(array[m]==data[countQuest].choice4){    
//             game.contextQuestion.fillText("C) "+data[countQuest].choice4,190,450);
//                }
//               if(array[m]==data[countQuest].choice4){    
//             game.contextQuestion.fillText("D) "+data[countQuest].choice4,190,450);
//                }
       game.contextQuestion.fillText(data[countQuest].choice4,190,450);
//            }
      }
      if(game.gameWon){
        game.contextBackground.clearRect(0,0,game.width*2,100);
        game.contextBackground.font ="bold 50px arial";
        game.contextBackground.fillStyle = "white";
        game.contextBackground.fillText("Correct",game.width/2-150,100);
      }
    }

////////////////////////////////////////////ANIMATION FRAME RESET///////////////////
    function loop(){
      requestAnimFrame(function(){
        loop();
        });
        //console.log("hello");
        update();
        render();
    }
/////////////////////Download necessary Images/////////////////
    function intitImages(paths){
      game.requiredImages = paths.length;
      for(i in paths){
        var img = new Image();
        img.src = paths[i];
        game.images[i]= img;    //sets path into image array
        game.images[i].onload = function(){
          game.doneImages++;
        }
      }
    }
    function checkImages(){
      if(game.doneImages >= game.requiredImages){
        intit();
      }else{
        setTimeout(function(){
          checkImages();
        }, 1); //this 'else' checks if image is done loading

      }
    }
///////////////////////COLLISION DETECTION////////////////
    function collision(first,second){
      return !(first.x>second.x+second.width||
              first.x+first.width<second.x||
              first.y>second.y+second.height||
              first.y+first.height<second.y);
    }
/////////////////////RESET////////////////
  //   nextButt.click(function(){
  //
  //   //   if(game.gameWon||game.gameOver)
  //   //   {
  //   //   questSet.question="What is 1+5?";
  //   //   questSet.ch1="A. 7";
  //   //   questSet.ch2="B. 8";
  //   //   questSet.ch3="C. 6";
  //   //   questSet.ch4="D. 9";
  //   //   questSet.ch5=2
  //   //
  //   //   game.contextQuestion.font ="40px arial";
  //   //   game.contextQuestion.fillStyle = "white";
  //   //   game.contextQuestion.fillText("Question:",50,50);
  //   //   game.contextQuestion.fillText(questSet.question,50, 100);
  //   //   game.contextQuestion.fillText("Choices:",50, 200);
  //   //   game.contextQuestion.fillText(questSet.ch1,50, 250);
  //   //   game.contextQuestion.fillText(questSet.ch2,50, 300);
  //   //   game.contextQuestion.fillText(questSet.ch3,50, 350);
  //   //   game.contextQuestion.fillText(questSet.ch4,50, 400);
  //   //   console.log("next");
  //   // }
  // });

    resButt.click(function()
    {
      if(game.gameWon||game.gameOver){
      clearCanvas(); clearCanvas(); clearCanvas(); clearCanvas(); clearCanvas(); clearCanvas();
      intit();
      game.contextPlayer.drawImage(game.images[0],game.player.x,game.player.y,100,100);
      countQuest++;
      array = questionMaker();
      game.enemySpeed= 0;

      game.gameWon = false;
      game.gameOver = false;
      game.moving=false;
      setTimeout(function(){
        game.moving = true;
      },1500);

    }

      });



    game.contextBackground.font ="bold 50px moaco";
    game.contextBackground.fillStyle = "white";
    game.contextBackground.fillText("loading",game.width/2-100,game.height/2-25);
    intitImages(["spaceships.png","aliens.png","bullets.png","explosion.png"]);
    checkImages();
  });
})();
/////////////////////REFRESH FRAME IN ANY BROWSER//////////////////
//resets your page however many frames perseconds needed
 //shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          window.oRequestAnimationFrame      ||
          window.msRequestAnimationFrame     ||
          function( callback ){
            window.setTimeout(callback, 100000 / 60);
          };
})();


//*COMMENTS

// line 2 below allows webpage to load all elements first before trying to access them **$**
//$(document).ready(function(){
  //var canvas = document.getElementById("backgroundCanvas"); // creates variable of canvas from index.html
  //console.log("loaded"); //says page is loaded
  //console.log(canvas); //checks if page is loaded
//  })


//This is how to create squares on screen (put in first function)
// game.contextBackground = document.getElementById("backgroundCanvas").getContext("2d");
// game.contextPlayer = document.getElementById("playerCanvas").getContext("2d");
//
// game.contextBackground.fillStyle = "green";
// game.contextBackground.fillRect(100,100,50,50);
//
// game.contextPlayer.fillStyle = "blue";
// game.contextPlayer.fillRect(125,125,50,50);

////POTENTIAL RESET
//
//   for(i in game.enemies){
//     if(i){
//
//       game.contextEnemies.clearRect(game.enemies[i].x,game.enemies[i].y,game.enemies[i].width,game.enemies[i].height);
//
//       game.enemies.splice(i,1);
//       game.contextPlayer.clearRect(game.player.x,game.player.y,game.player.width,game.player.height);
//
//       game.contextBackground.clearRect(0,0,game.width,game.height);
//       game.contextBackground.fillStyle = "white";        }
//   }
//   if(game.enemies.length==0){
//   startGame();
//   }
