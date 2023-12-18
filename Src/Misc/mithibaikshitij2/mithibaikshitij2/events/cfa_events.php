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
    <title>Creatives and Fine Arts</title>
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
            <img class="card-img-top" src="../assets/Anime comic Strip.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">ANIME COMIC STRIP MAKING</h5>
                <p class="card-text">The participants have to draw an anime comic strip on an A3 size paper on the particular theme given.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Mandala + Quilling.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">MANDALA + QUILLING</h5>
                <p class="card-text">In this event,the participants have to make a mandala with the help of quilling on a paper.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Digital Layering (2).jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">LAYERING + DIGITAL ART</h5>
                <p class="card-text">The participants have to make a layering art digitally on the theme given to them. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Digital Fashion Illustration.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">DIGITAL FASHION ILLUSTRATION</h5>
                <p class="card-text">For this event,the participants will be given a theme and on the basis of that they have to illustrate it,according to their creativity. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Break the Painting.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">CANVAS PAINTING</h5>
                <p class="card-text">Participants are expected to make an artwork using 3-4 chart papers. Organizing committee will provide the participants with the chart papers and a theme. The participants will have to break their artwork on 3-4 chart papers and present it to the judge after the completion</p>

            </div>

        </div>
        
        

    </div>
    </div>
</body>

</html>