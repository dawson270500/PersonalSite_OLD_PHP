//Variables
var dScore=0;
var start = true;
const myCanvas=document.getElementById("myCanvas");
const myContext=myCanvas.getContext('2d');
myCanvas.width = 600;
myCanvas.height = 600;
var mSpeed = 50;
var p = 1;
var done = 0;
var round = 1;
var lost = false;
var roundChange = false;
var line1 ={
    y: 40,
    md: 0,
};
var player ={
    height: 40,
    width: 40,
    x: 10,
    y: 520,
    color: "#00ff48",
    sX: 25, // Player bullet
    sY: 0,
    sV: 0,
};

//Shared invader vars
const invaderColor = "#ffffff";
const invaderHeight = 20;
const invaderWidth = 30;
//Invaders
var invade ={
    height: invaderHeight,
    width: invaderWidth,
    x: 20,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
var invade1 ={
    height: invaderHeight,
    width: invaderWidth,
    x: 100,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
var invade2 ={
    height: invaderHeight,
    width: invaderWidth,
    x: 180,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
var invade3 ={
    height: invaderHeight,
    width: invaderWidth,
    x: 260,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
var invade4 ={
    height: invaderHeight,
    width: invaderWidth,
    x: 340,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
var invade5 ={
    height: invaderHeight,
    width: invaderWidth,
    x: 420,
    y: 40,
    color: invaderColor,
    D: 0,
    V: 1,
};
//Player Movement
document.addEventListener('keydown', function(event){
    if(p==0){//Pasue, you can't move if paused
        //left
        if(event.keyCode == 37){
            if(player.x>10){
                player.x-=10;
            }
        }
        //right
        if(event.keyCode == 39){
            if(player.x<550){
                player.x+=10;
            }
        }
        //Shoot
        if(event.keyCode == 17){
            if(player.sY < 0 || player.sV == 0){
                player.sY=520;
                player.sX=player.x+15;
                player.sV=1;
            }
        }
    }
    //Pause
    if(event.keyCode == 80){
        if(p==0 && lost == false && roundChange == false){
            p=1;
        }
        else if(lost==false && p==1 && roundChange == false){
            p=0;
        }
        if(start == true){
            start = false;
        }
    }

    //Round change
    if(event.keyCode == 13 && roundChange == true){
        if (roundChange == true){//If round has been won, so it doesn't reset score, and the game speeds up 
            round += 1;
            if(mSpeed > 15){
                mSpeed = 50 - (round*2);
            }
            console.log(mSpeed);
            clearInterval(loop); // Clear the current interval call then add a new one with new time
            loop = setInterval(move, mSpeed);
        }
        else if (lost == true){//if the game has been lost so it can reset score and everything
            round = 1;
            dScore=0;
            mSpeed = 50;
        }
        if(lost == true || roundChange == true){//Resetting all the other variables
            p = 1;
            done = 0;
            lost = false;
            roundChange = false;
            line1 ={
                y: 40,
                md: 0,
            };
            player ={
                height: 40,
                width: 40,
                x: 10,
                y: 520,
                color: "#00ff48",
                sX: 25,
                sY: 0,
                sV: 0,
            };
            invade ={
                height: 20,
                width: 30,
                x: 20,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade1 ={
                height: 20,
                width: 30,
                x: 100,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade2 ={
                height: 20,
                width: 30,
                x: 180,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade3 ={
                height: 20,
                width: 30,
                x: 260,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade4 ={
                height: 20,
                width: 30,
                x: 340,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade5 ={
                height: 20,
                width: 30,
                x: 420,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
        }
    }
    else if(event.keyCode == 13 && lost == true){
        if (lost == true){//if the game has been lost so it can reset score and everything
            round = 1;
            dScore=0;
            mSpeed = 50;
        }
        if(lost == true || roundChange == true){//Resetting all the other variables
            p = 1;
            done = 0;
            lost = false;
            roundChange = false;
            line1 ={
                y: 40,
                md: 0,
            };
            player ={
                height: 40,
                width: 40,
                x: 10,
                y: 520,
                color: "#00ff48",
                sX: 25,
                sY: 0,
                sV: 0,
            };
            invade ={
                height: 20,
                width: 30,
                x: 20,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade1 ={
                height: 20,
                width: 30,
                x: 100,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade2 ={
                height: 20,
                width: 30,
                x: 180,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade3 ={
                height: 20,
                width: 30,
                x: 260,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade4 ={
                height: 20,
                width: 30,
                x: 340,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
            invade5 ={
                height: 20,
                width: 30,
                x: 420,
                y: 40,
                color: "#ffffff",
                D: 0,
                V: 1,
            };
        }
    }
});
//Rendering
function renderObject(){
    myContext.fillStyle="#ffffff";//Player Render
    myContext.fillRect(player.x, player.y, player.width, player.height);
    myContext.fillStyle=player.color;//Invaders Render
    if(invade.V==1){myContext.fillRect(invade.x, invade.y, invade.width, invade.height);}
    if(invade1.V==1){myContext.fillRect(invade1.x, invade1.y, invade1.width, invade1.height);}
    if(invade2.V==1){myContext.fillRect(invade2.x, invade2.y, invade2.width, invade2.height);}
    if(invade3.V==1){myContext.fillRect(invade3.x, invade3.y, invade3.width, invade3.height);}
    if(invade4.V==1){myContext.fillRect(invade4.x, invade4.y, invade4.width, invade4.height);}
    if(invade5.V==1){myContext.fillRect(invade5.x, invade5.y, invade5.width, invade5.height);}
    if(player.sV==1){myContext.fillRect(player.sX, player.sY, 5, 10);}

    myContext.fillStyle="#ffffff";//Text Render
    if(lost == true){
        myContext.font="40px Arial";
        myContext.fillText("You Lose, Enter to Restart",80,300);
    }
    myContext.font="15px Arial";
    myContext.fillText("Score = " + dScore + " | Round = " + round,20,20);//Just sits at top like a dude
    if(lost == false && p==1){//Tells Player How to Pause/Unpause
        if(!start){
            myContext.fillText("Game Paused",80,300);
        }
        myContext.fillText("Press P to Unpause",190,580);
    }
    if(lost == false && p==0){
        myContext.fillText("Press P to Pause",190,580);
    }
    if (roundChange == true){//Round End Text
        myContext.font="40px Arial";
        myContext.fillText("Round Finished",80,300);
        myContext.fillText("Enter to Continue", 80, 340);
    }
    if(start == true && p==1){
        myContext.font="15px Arial";
        myContext.fillText("Controls:", 80,200);
        myContext.fillText("Left = Left Arrow", 85,216);
        myContext.fillText("Right = Right Arrow", 85,232);
        myContext.fillText("Shoot = Control", 85,248);
        myContext.fillText("P to start", 85, 264);
    }
}
function renderCanvas(){//Background Render, Resets from last frame
    myContext.fillStyle = "#000000";
    myContext.fillRect(0, 0, 600, 600);
    renderObject();
}
//Collision Detection
function collision(){
    if(p==0){
        if(invade.V==1){//Invader 1
            if(player.sY==invade.y){
                if(player.sX>=invade.x){
                    if(player.sX<=(invade.x+30)){
                        invade.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade1.V == 1){//Invader 2
            if(player.sY==invade1.y){
                if(player.sX>=invade1.x){
                    if(player.sX<=(invade1.x+30)){
                        invade1.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade2.V == 1){//Invader 3
            if(player.sY==invade2.y){
                if(player.sX>=invade2.x){
                    if(player.sX<=(invade2.x+30)){
                        invade2.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade3.V == 1){//Invader 4
            if(player.sY==invade3.y){
                if(player.sX>=invade3.x){
                    if(player.sX<=(invade3.x+30)){
                        invade3.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade4.V == 1){//Invader 5
            if(player.sY==invade4.y){
                if(player.sX>=invade4.x){
                    if(player.sX<=(invade4.x+30)){
                        invade4.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade5.V == 1){//Invader 6
            if(player.sY==invade5.y){
                if(player.sX>=invade5.x){
                    if(player.sX<=(invade5.x+30)){
                        invade5.V=0;
                        dScore+=10;
                        player.sV=0;
                    }
                }
            }
        }
        if(invade.V == 0 && invade1.V == 0 && invade2.V == 0 && invade3.V == 0&& invade4.V == 0&& invade5.V == 0){//Round End
            p=1;//Pause
            roundChange = true;//Telling Renderer to Render Round End Text
        }
    }
    renderCanvas();
}
function lineDown(){//Works out if the invaders need to go down a line
    if(p==0){
        if(((invade.x == 580 || invade.x == 10) && invade.V == 1) || ((invade1.x == 580 || invade1.x == 10) && invade1.V == 1) 
        || ((invade2.x == 580 || invade2.x == 10) && invade2.V == 1) || ((invade3.x == 580 || invade3.x == 10) 
        && invade3.V == 1) || ((invade4.x == 580 || invade4.x == 10) && invade4.V == 1) 
        || ((invade5.x == 580 || invade5.x == 10) && invade5.V == 1)){
            invade.y+=40;
            invade1.y+=40;
            invade2.y+=40;
            invade3.y+=40;
            invade4.y+=40;
            invade5.y+=40;
            if(line1.md == 0){//What way on X the invaders should move
                line1.md = 1;//Left
            }
            else{
                line1.md = 0;//Right
            }
        }
        if (invade.y>=520 || invade2.y>=520 || invade1.y>=520 || invade3.y >= 520 || invade4.y>=520|| invade5.y>=520){//Lose
            p=1;
            lost = true;
        }
    }
    collision();
}
//Enemy Movement
function move(){
    if(p==0){//Pause, so they don't move when paused
        if(player.sY >= 0){player.sY-=20;}
        if(invade.V==1){//Invader 1
            if(line1.md==0){
                invade.x += 5;
            }
            else{
                invade.x -= 5;
            }
        }
        if(invade1.V==1){//Invader 2
            if(line1.md==0){
                invade1.x += 5;
            }
            else{
                invade1.x -= 5;
            }
        }
        if(invade2.V==1){//Invader 3
            if(line1.md==0){
                invade2.x += 5;
            }
            else{
                invade2.x -= 5;
            }
        }
        if(invade3.V==1){//Invader 4
            if(line1.md==0){
                invade3.x += 5;
            }
            else{
                invade3.x -= 5;
            }
        }
        if(invade4.V==1){//Invader 5
            if(line1.md==0){
                invade4.x+=5;
            }
            else{
                invade4.x-=5;
            }
        }
        if(invade5.V==1){//Invader 6
            if(line1.md==0){
                invade5.x+=5;
            }
            else{
                invade5.x-=5;
            }
        }
    }
    lineDown();
}