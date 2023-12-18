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
    <title>Photography</title>
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
            <img class="card-img-top" src="../assets/Potrait Photography.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">PORTRAIT PHOTOGRAPHY</h5>
                <p class="card-text">Capturing personalities with the perfect blend of elements.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Product Photography.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">PRODUCT PHOTOGRAPHY</h5>
                <p class="card-text">Entice buyers through your lenses. Product Photography emphasises on product details and features to give potential buyers a full impression of the product.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Reflection.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">REFLECTION PHOTOGRAPHY</h5>
                <p class="card-text">How often do you photograph things from a different perspective? Take a reflective look at things through reflection photography. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Street Photography.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">STREET PHOTOGRAPHY</h5>
                <p class="card-text">A genre of photography that records everyday life in a public place, the photographer captures the candidness through his lens. </p>

            </div>
        </div>

    </div>
    </div>
</body>

</html>