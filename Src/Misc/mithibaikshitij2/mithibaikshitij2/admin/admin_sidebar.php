<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="admin_dashboard.css">

</head>
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
<?php
    // session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }

?>

<body>


<div class="main" style="display: unset;">

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 220px; position: sticky; top:0px; position: -webkit-sticky; height: 100vh;">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
         
          <img class="logo" src="../assets/logo.png" alt=""/>
          <img class="logo" src="../../assets/logo.png" alt=""/>
          <span class="fs-4">Admin Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item hoverr">
            <a href="../admin_dashboard.php" class="nav-link text-white" aria-current="page">
              Dashboard
            </a>
          </li>
          <li class="hoverr">
            <a href="../../admin/addCC.php" class="nav-link text-white">
              
              ADD CC
            </a>
          </li>
          <li class="hoverr">
            <a href="../../admin/addDept.php" class="nav-link text-white">
              
              ADD Departments
            </a>
          </li>
          <li class="hoverr">
            <a href="../../admin/addEvents.php" class="nav-link text-white">
             
              ADD Events
            </a>
          </li>
          <li class="hoverr">
            <a href="../../admin/ccregisteredevents.php" class="nav-link text-white">
             
              CC Registered Events
            </a>
          </li>
          <li class="hoverr">
            <a href="../../admin/ncpregisteredevents.php" class="nav-link text-white">
              
              NCP Registered Events
            </a>
          </li>

          <li class="hoverr">
            <a href="../../admin/leaderboard/bethistory.php" class="nav-link text-white">
              
              Bet History
            </a>
          </li>

          <li class="hoverr">
            <a href="../../admin/leaderboard/result.php" class="nav-link text-white">
             
              Event Result
            </a>
          </li>
          
        

        </ul>
        <hr>
        <div class="dropdown">
            <div class="kv">
              <strong class="align">Admin</strong>
              <button class="btn"><a class="btn-a" href="../logout/logout.php">Log out</a></button>
            </div>
          
        </div>
      </div>
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>
