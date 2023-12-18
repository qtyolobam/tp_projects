<?php

  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Events</title>
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
            <img class="card-img-top" src="../assets/Pitch your startup.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">PITCH YOUR START UP</h5>
                <p class="card-text">In the following event the participants have to come up with a unique startup idea which they have to present to a panel of judges. The startup idea should be a solution for day-to-day problems.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/Mock Stock.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">MOCKSTOCK</h5>
                <p class="card-text">The event is a simulated trading event where the participants
                    have to manage their own portfolio and compete with other
                    participants in a risk-free environment. Simply buy stocks to build
                    your initial portfolio and continue to track the market. Do not forget to
                    shuffle your portfolio to grab opportunities provided so as to
                    maximize your gains.</p>

            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../assets/IPL Auction.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">IPL AUCTION</h5>
                <p class="card-text">The following event will test the Ipl knowledge of the participants and it will test the resource allocation skills of participants </p>

            </div>
        </div>

        



    </div>
    </div>
</body>

</html>