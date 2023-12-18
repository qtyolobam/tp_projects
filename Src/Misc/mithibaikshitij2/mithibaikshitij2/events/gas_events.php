<?php

  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming and Sports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


</head>

<style>
     .divide{
        display:flex;
    }
    body {
        background: url(../assets/bg.jpg);
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;
        
    }

    .container-manual {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;

    }

    .card {
        margin: 10px 10px;
        filter: drop-shadow(7px 7px 4px #000000);
    }

    h1 {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
    
    .divide{
display:flex;
flex-direction:column;
background-repeat: none;
background-size: cover;
background-attachment: fixed;
text-align: center;
}

p{
font-size: 15px;
}
.container-manual {
    display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
width: 100%;
padding: 20px 20px;
border-radius:10px;
}

input {
width: 100%;
}
h1{
font-size: 45px;
}
input{
padding:6px 10px;
}
.form-label{
font-size:15px;
}
header{
width:100%;
}
a{
    text-align:left;
    /* float:left; */
}
.align{
    text-align:left;
}
}
</style>


<body>
    <div class="divide">
<header>
<?php
if(!isset($_SESSION['ncploggedin']) && !isset($_SESSION['ccloggedin'] ))
{
    header("location:https://mithibaikshitij.com/");
    exit;
}
    if(isset($_SESSION['ncploggedin']))
  {
     include "../global/ncp_sidebar.php" ;
  }
  if(isset($_SESSION['ccloggedin']))
  {
  include "../global/cc_sidebar.php" ;
  }
    ?>
    </header>
    <div class="container-manual">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Chess.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">CHESS</h5>
                <p class="card-text">Chess is played by two opponents on a checkerboard with specially designed pieces of contrasting colours, commonly white and black. The objective of the game is to capture the opponent's king.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Crossfit.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">CROSSFIT</h5>
                <p class="card-text">CrossFit is a strength and conditioning workout that is made up of functional movement performed at a high intensity level.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/BGMII.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">BATTLEGROUNDS MOBILE INDIA</h5>
                <p class="card-text">BGMI( previously known as PUBG Mobile India) is an online multiplayer battle royale game developed and published by Krafton. The game is exclusively for the Indian users. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Rocket League.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">ROCKET LEAGUE</h5>
                <p class="card-text">Described as “soccer,but with rocket-powered cars”,participants will have to get the better of everyone in order to win this game of Rocket League </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/CSGO.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">COUNTER STRIKE : GLOBAL OFFENSIVE</h5>
                <p class="card-text">It is a multiplayer team-based first person shooter gameplay where two teams, Terrorists and Counter-Terrorists, against each other in different objective-based game modes</p>

            </div>

        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Valornat.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">VALORANT</h5>
                <p class="card-text">Valorant is a tactical shooting game involving two teams with 5 players in each team. Every player can sign in and play remotely from anywhere in the world </p>

            </div>

        </div>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Fifa.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">FIFA 22 </h5>
                <p class="card-text">FIFA 22 is an association football simulation video game published by EA sports as a part of FIFA series. </p>

            </div>

        </div>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Cricket.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">CRICKET</h5>
                <p class="card-text">Cricket is a bat-and-ball game played between two teams with a wicket at each end, each comprising two bails balanced on three stumps</p>

            </div>

        </div>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Football.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">FOOTBALL</h5>
                <p class="card-text">Football is a game involving two teams who try to maneuver the ball into the other team's goal without using their hands or arms.</p>

            </div>

        </div>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Table Tennis.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">TABLE TENNIS</h5>
                <p class="card-text">Table Tennis is a sport in which two players hit a lightweight ball, back and forth across a table using small rackets. The game takes place on a hard table divided by a net.
</p>

            </div>

        </div>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Pool.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">POOL</h5>
                <p class="card-text">A call-shot game along with cue- ball and 15 numbered object balls. Player must pocket his respected 7 balls and likewise for the opponent. The player who pockets all his balls along with the 8-ball will be the winner.</p>

            </div>

        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Kabaddi.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">KABADDI</h5>
                <p class="card-text">A team sport with 7 players in each teams. The raider needs to score point(s) on the opponent' ground and returns to its ground without getting out while the other team has to defend their team from the raider.</p>

            </div>

        </div>
        

    </div>
    </div>
</body>

</html>