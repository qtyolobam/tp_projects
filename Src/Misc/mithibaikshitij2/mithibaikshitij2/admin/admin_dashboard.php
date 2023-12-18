<?php
require_once "../includes/config.php";

$dept_sql = "select count(*) from departments";
$dept_result = mysqli_query($conn, $dept_sql);
while ($dept_row = mysqli_fetch_array($dept_result)) {
    $deptcount = $dept_row['count(*)'];
}

$event_sql = "select count(*) from events";
$event_result = mysqli_query($conn, $event_sql);
while ($event_row = mysqli_fetch_array($event_result)) {
    $eventcount = $event_row['count(*)'];
}

$ccregi_sql = "select count(*) from cclogin";
$ccregi_result = mysqli_query($conn, $ccregi_sql);
while ($ccregi_row = mysqli_fetch_array($ccregi_result)) {
    $ccregicount = $ccregi_row['count(*)'];
}

$ncpregi_sql = "select count(*) from pi_regi";
$ncpregi_result = mysqli_query($conn, $ncpregi_sql);
while ($ncpregi_row = mysqli_fetch_array($ncpregi_result)) {
    $ncpregicount = $ncpregi_row['count(*)'];
}

$ccconfirmed_sql = "select count(*) from cceventregi where status = 'confirmed';";
$ccconfirmed_result = mysqli_query($conn, $ccconfirmed_sql);
while ($ccconfirmed_row = mysqli_fetch_array($ccconfirmed_result)) {
    $ccconfirmedcount = $ccconfirmed_row['count(*)'];
}

$ncpconfirmed_sql = "select count(*) from ncpeventregi where status = 'confirmed';";
$ncpconfirmed_result = mysqli_query($conn, $ncpconfirmed_sql);
while ($ncpconfirmed_row = mysqli_fetch_array($ncpconfirmed_result)) {
    $ncpconfirmedcount = $ncpconfirmed_row['count(*)'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../Global1.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <style>
      .logo{
        width:200px;  
      }
      .event-card{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        
        justify-content: center;
        align-items: center;

    }
    .card{
      width:200px;
      height: 200px;
      margin: 7px 40px;
      border: 2px solid red;
      text-align: center;
      
    }
    .card p{
      color: black;
    }
    h1{
      text-align: center;
      align-items: center;
    }
    </style>

    

</head>

<?php
  session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }

?>
<body>

<header class="dashboard">
        <?php include "../global/admin_sidebar.php" ?>
</header>

<div class="event-card">
<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of Departments are "?></h5>
    <h1><?php echo "$deptcount";?></h1>
    
    
  </div>
</div>

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of Events are "?></h5>
    <h1><?php echo "$eventcount";?></h1>
  
    
  </div>
</div>

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of CC Registered are "?></h5>
    <h1><?php echo "$ccregicount";?></h1>
    
  </div>
</div>

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of NCP Registered are "?></h5>
    <h1><?php echo "$ncpregicount";?></h1>
    
  </div>
</div>

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of CC Confirmed are "?></h5>
    <h1><?php echo "$ccconfirmedcount";?></h1>
    
  </div>
</div>

<div class="card">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "No. of NCP Confirmed are "?></h5>
    <h1><?php echo "$ncpconfirmedcount";?></h1>
    
  </div>
</div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
