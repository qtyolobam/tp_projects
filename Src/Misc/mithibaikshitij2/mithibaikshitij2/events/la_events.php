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
    <title>Literary Arts</title>
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
            <img class="card-img-top" src="../assets/Character Debate.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">CHARACTER DEBATE</h5>
                <p class="card-text">Debate on thought-provoking issues by getting into the role of the given fictional characters from prominent literary works & popular media</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Poetry Slam.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">POETRY EVENT</h5>
                <p class="card-text">Express your thoughts through words in this classic literary event of Slam Poetry, but with a twist</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Ghost Story writing.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">GHOST STORY WRITING</h5>
                <p class="card-text">For all the horror lovers out there, unleash your inner R.L Stine in this creative writing event as you pen down stories which send shivers down our spine. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Word Game event.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">WORD GAME EVENT</h5>
                <p class="card-text">Do you claim yourself to be the ruler of words? Prove your worth in this entertaining yet challenging word game event.. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/JAM.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">JAM</h5>
                <p class="card-text">Flaunt your oratory skills, grammar & presence of mind in this exciting JAM event as you battle against time</p>

            </div>

        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Mock Youth Parliment.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">MOCK YOUTH PARLIMENT</h5>
                <p class="card-text">Discuss pressing national & global issues as you step into the shoes of being a young leader in this exhilarating simulation of the Parliament. </p>

            </div>

        </div>
        
        

    </div>
    </div>
</body>

</html>