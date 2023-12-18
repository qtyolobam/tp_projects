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
    <title>Informals</title>
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
            <img class="card-img-top" src="../assets/MMK.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">MR AND MS KSHITIJ</h5>
                <p class="card-text">Participants have the opportunity to showcase their unique personality, skills and talents. They will be judged accordingly and may stand a chance to bag the title of Mr and Ms Kshitij’21. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/RJ Hunt.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">RJ HUNT</h5>
                <p class="card-text">Have the personality to work your way through your voice, the art of bringing enthusiasm in the audience, are a great communicator and have presence of mind in weird situations too? Then this event is surely for you</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/KBC.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">KAUN BANEGA KSHITIJPATI</h5>
                <p class="card-text">Think of yourself as an Erudite? Then this is definitely the right event for you. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Treasure Hunt.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">TREASURE HUNT</h5>
                <p class="card-text">A good pair of eyes, sharp mind to crack the clues, great teamwork, patience and the will to win, shall surely make you win </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/The Ultimate Challenge.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">THE ULTIMATE CHALLENGE</h5>
                <p class="card-text">It’s the ultimate battle where in there will be three rounds- an Obstacle relay race, Soapy football and Sports Pong. Enthusiasm, team spirit and sportsmanship are the key to winning this event. </p>

            </div>

        </div>
        
        
        

    </div>
    </div>
</body>

</html>