<?php
require_once "../includes/config.php";
session_start();
    $loginuser = $_SESSION['ncpid'];
    // echo $loginuser;
$sql = "select ncpeventregi.ncpid,ncpeventregi.participant_name,pi_regi.email,pi_regi.collegename,pi_regi.phone,pi_regi.dob,ncpeventregi.dept_name,ncpeventregi.event_name,ncpeventregi.status,ncpeventregi.timeofregistration from ncpeventregi, pi_regi where ncpeventregi.ncpid = '$loginuser' and pi_regi.NCPID ='$loginuser'";
$result = mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../Global1.css">
</head>
<?php
//   session_start();
  if(!isset($_SESSION['ncploggedin']))
  {
      header("location:../ncp/ncplogin.php");
      exit;
  }
?>
<style>
  /* body{
    max-width:100%;
    font-family: "Trirong";
    background: url(../assets/bg.jpg);
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;

      } */

      body{
        color:white;
      }
      h2{
        color : white;
      }
  table{
    margin:10px;
    max-width:95%;
  }


  th {
  background-color: #087f5b;
  color: black;
  /* width: 25%; */
  font-weight:800;
}
  th, td {
  color:black;
  border: 1px solid #343a40;
  padding: 0px 0px;
  text-align: left;
  /* border:none; */

}

tbody tr:nth-child(odd){
        background-color: #f8f9fa;
      }

      
      tbody tr:nth-child(even){
        background-color: #e9ecef;
      }

      .main{
          display:flex;
          flex-direction:row;
      }

      .bg-dark{
        height: 200%;
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
      /* display:none; */
      width: auto;
      margin: 10px auto;
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
    .main{
      display:none;
    }
/* 
  table{
    margin:2px;
    font-size:9px;
    table-layout: fixed;
    width: 100%;
    word-break: break-all
  }
  .btn{
    color:white;
    width:auto;
    height: 4px;
    font-size:6px;
  }
  th, td{
    padding: 0px 0px;
  }
a{
  opacity: 0;
} */

  }
</style>

<body>

<header class="dashboard_1">
      <?php include "../global/ncp_sidebar.php" ?>
</header>

    
<div class="container-manual">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
    <form action="ncpregisteredevents.php" method="post">
      <table class="table">
      
      <tr>
        <td>NCP ID</td>
      <td style="width:100px;">Participant Name</td>
        <td style="width:50px;">Email Id</td>
        <td>College Name</td>
        <td>Phone no.</td>
      <td>Event Name</td>
      <td>Status</td>
      <td style="width:50px;">Action</td>

      <!-- <td>Action</td> -->
      </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row["ncpid"]; ?></td>
        <td><?php echo $row["participant_name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["collegename"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["event_name"]; ?></td>
      <td><?php echo $row["status"]; ?></td>
      <!-- <td><?php echo "<button class='btn btn-primary'  type='submit' >Confirm</button>" ?></td> -->
      <td><?php echo "<button class='btn btn-primary'><a class='btn_link' style='color:white; text-decoration:none;' href='../events/ncpsubstitute.php'>Substitute</a></button> "?></td>

    </tr>
    <?php
    $i++;
    }
    ?>
    </table>
    
    <?php
    }
    else{
        echo "<h2>You have not registered for any event</h2>";
    }
    ?>
    </div>
</div>
</body>

</html>