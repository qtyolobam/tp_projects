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
    <title>Mass Media Events</title>
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
            <img class="card-img-top" src="../assets/Short Film Making.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">SHORT FILM</h5>
                <p class="card-text">Creating an original short film based on the themes given.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Ad Film Making.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">AD FILM</h5>
                <p class="card-text">Creating an ad film to reach out to the audience with the given theme.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/YouTube Fest.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">YOUTUBE FEST</h5>
                <p class="card-text">An opportunity for you to bring out the inner youtuber in you and create fun filled YouTube videos based on the given themes. </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Social Media Stratergy.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">SOCIAL MEDIA MARKETING</h5>
                <p class="card-text">This event will test your expertise in social media marketing right from creating a new brand and planning launch activities for the same to revamping a company's reputation using social media platforms </p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/News reporting.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">NEWS REPORTING</h5>
                <p class="card-text">A perfect opportunity for you to test your waters in the field of journalism wherein you get the chance to personify a news reporter and cover a Day at Kshitij`21.</p>

            </div>

        </div>
        
        
        

    </div>
    </div>
</body>

</html>