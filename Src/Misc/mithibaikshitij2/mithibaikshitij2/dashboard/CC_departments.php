<?php
require_once "../includes/config.php";
  session_start();
    $loginuser = $_SESSION['ccid'];
    // echo $loginuser;
$sql = "select cceventregi.ccid,cceventregi.participant_name,cclogin.email,cceventregi.college_name,cceventregi.phone_number,cceventregi.event_name,cceventregi.status from cceventregi, cclogin where cceventregi.ccid = '$loginuser' and cclogin.userid ='$loginuser'";
// select cceventregi.ccid,cceventregi.participant_name,cclogin.email,cceventregi.college_name,cceventregi.phone_number,cceventregi.dept_name,cceventregi.event_name,cceventregi.attachment,cceventregi.status,cceventregi.timeofregistration, cceventregi.idproof from cceventregi, cclogin where cceventregi.ccid = cclogin.userid and event_name='$event';";
$result = mysqli_query($conn,$sql);

$bet_sql = "select event_name, event_type, bet_point, result from bets where ccid = '$loginuser'";
$bet_result = mysqli_query($conn,$bet_sql);

$event_regi_sql = "select ccid, event_name, points from cc_regi_point where ccid = '$loginuser'";
$event_regi_result = mysqli_query($conn,$event_regi_sql);

$score_sql = "select points from leaderboard where college_code = '$loginuser'";
$score_result = mysqli_query($conn,$score_sql);

$rank_sql = "select college_code, rank() OVER ( order by points desc ) as 'rank' from leaderboard;";
$rank_result = mysqli_query($conn,$rank_sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Global1.css">
  
</head>

<style>
    /* body{
      background: url(../assets/bg.jpg);
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;
    }
  .container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    
} */
.container-manual{
  width: 80%;
}
.event-card{
  display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}
.card{
  margin: 20px 12px;
}

.card-manual{
  margin: 20px 12px;
  color: #ffffff;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  /* border-radius: 20px; */
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  transition: 0.2s;
  border: 0.5px solid #ffffff;
  box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.2);
}
h5{
  font-family: "Poppins", sans-serif;
  text-transform: Uppercase;
}

.btn{
  width:150px;
  text-align:center;
}
.h-center{
  text-align: center;
}

@media only screen and (max-width: 600px) {
    
    body{
    display:flex;
    flex-direction:column;
    margin: 10px;
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;
    text-align: center;
    }
    
    p{
        font-size: 15px;
    }
    .container-manual {
      width: 90%;
      padding: 2px 2px;
      border-radius:0px;

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
}
</style>
<?php
if(!isset($_SESSION['ccloggedin']))
  {
      header("location:../CC/cclogin.php");
      exit;
  }
  ?>
<body>





<header class="dashboard">
      <?php include "../global/cc_sidebar.php" ?>
    </header>


  <div class="container-manual">

  <h1 class="h-center">DEPARTMENTS</h1>

  <div class="event-card">

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Mashup Singing.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Perfroming Arts</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/pa_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Treasure Hunt.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Informals</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/informals_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Cricket.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Gaming And Sports</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/gas_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Character Debate.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Literary Arts</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/la_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Digital Layering (2).jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Creatives And Fine Arts</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/cfa_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Short Film Making.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Mass Media</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/mm_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Street Photography.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Photography</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/photo_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>

    <div class="card-manual" style="width: 18rem;">
      <img src="../assets/Pitch your startup.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Business Events</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        <a href="../events/business_events.php" class="btn btn-primary">See Events</a>
      </div>
    </div>
</div>




  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>