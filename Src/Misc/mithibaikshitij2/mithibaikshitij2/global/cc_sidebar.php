<?php
require_once "../includes/config.php";
// session_start();
$loginuser = $_SESSION['ccid'];
// echo $loginuser;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<?php
  // session_start();
if(!isset($_SESSION['ccloggedin']))
{
    header("location:https://mithibaikshitij.com/");
    exit;
}

?>
<style>
  .hoverr:hover{
    background-color:black;

  }
  .align{
    margin-left: 0.9rem;
  }
  .kv{
   display:flex;
   flex-direction:column;
  }
  
  .kunal{
   max-width: 220px;
    height: 100vh;
     position:sticky;

      top:0;
      left:0;
    
  }
  .main{
    display:flex;
    transition:0.5s;
    display:unset;
  }
  h1{
    font-family: 'Poppins';
  }
.cont{
  display:flex;
  flex-direction:column;
  align-items:center;
}
  .btn {
    color: white;
    /* margin: 7px; */
    text-align:left;
   
  }

  .btn-a {
    text-decoration: none;
    color: white;

  }
  .logo {
    width: 200px;
  }
  .toggle-menu{
    display:none;
    transition:0.5s;
  }

  @media only screen and (max-width: 600px) {
    .main{
      display:none; 
    }
    .kunal{
      height:93.2vh;
    }
    .ham{
      width: 100%;
      padding: 8px 12px;
      background-color: #212529;
      margin: 0px 10px 0px 0px;
    }
    .toggle-menu{
      display:flex;
      transition:0.5s;
    }
  }
</style>

<script>

function myFunction() {
  var x = document.getElementsByClassName("main");
  var y = document.getElementsByTagName("BODY")[0];
  var z = document.getElementsByClassName("container-manual")[0];

  // x.style.display = "none";

  if (x[0].style.display === "flex") {
    x[0].style.display = "none";
    z.style.display = "flex";
  } else {
    x[0].style.display = "flex";
    z.style.display = "none";

  }
}

</script>

<body>

<div class="ham">
  <img class="toggle-menu" style="width:40px;" src="../assets/ham.png" onclick="myFunction()"/>
  <!-- <button class="toggle-menu">Toggle</button> -->
</div>

<div class="main" >
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="max-width: 220px; height: 100vh; position:sticky; top:0; left:0;">
      <a href="../dashboard/CC_dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <div class="cont">
          <img class="logo" src="../assets/logo.png" />
          <h1 class="fs-4">CC Dashboard</h1>

        </div>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item hoverr">
          <a href="../dashboard/CC_dashboard.php" class="nav-link text-white" aria-current="page">
       
            Dashboard
          </a>
        </li>
        <li class="hoverr">
          <a href="../events/cceventregistration.php" class="nav-link text-white">
            
            Register Now
          </a>
        </li>
        <li class="hoverr">
          <a href="../CC/placeabet.php" class="nav-link text-white">
            
            Place a Bet
          </a>
        </li>
        <li class="hoverr">
          <a href="../dashboard/CC_departments.php" class="nav-link text-white">
            
            Browse Departments & Events
          </a>
        </li>

      </ul>
      <hr>
      <div class="dropdown">
        <div class="kv">
          <strong class="align"><?php echo "$loginuser" ?></strong>
          <button class="btn"><a class="btn-a" href="../logout/logout.php">Log out</a></button>
        </div>



      </div>
    </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
  </form>
</div>

</body>

</html>