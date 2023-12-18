<?php
require_once "includes/config.php";

$sql = "select college_name,college_code,points from leaderboard order by points desc;";
$result = mysqli_query($conn,$sql);

$sql_count = "select count(*) from leaderboard";
$result_count = mysqli_query($conn,$sql_count);


?>

<!DOCTYPE html>
<html>
 <head>
   <!--  meta tags -->
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Global1.css"> 

    <link rel="icon" href="assets/fav.png" type="image/x-icon">

 <title>Leaderboard</title>
 </head>
<style>
    .container-manual{
    font-size: 12px;
  }
  table{
    margin:10px;
    background-color: white;
    table-layout: fixed;
    width: 80%;
    word-break: break-all;
  }
  th {
  background-color: #087f5b;
  color: black;
  font-weight:bolder;
  text-transform:uppercase;
}
  th, td {
  color:black;
  border: 1px solid #343a40;
  padding: 16px 24px;
  text-align: left;

}
h1{
  text-align:center;
  align-items:center;
  font-size: 50px;
}
.btn-grp{
  display:flex;
  flex-direction:row;
  justify-content: right;
}
.btn{
  margin: 10px;
  width:150px;
}


tbody tr:nth-child(odd){
        background-color: #f8f9fa;
      }

      
      tbody tr:nth-child(even){
        background-color: #e9ecef;
      }

      @media only screen and (max-width: 600px) {
    .body {
      background-repeat: none;
      background-size: cover;
      background-attachment: fixed;
      text-align: center;
    }

    p {
      font-size: 15px;
    }

    .container-manual {
      width: 90%;
      padding: 20px 20px;
    }

    input {
      width: 70%;
    }

    h1 {
      font-size: 45px;
    }

    input {
      padding: 6px 10px;
    }

    .form-label {
      font-size: 15px;
    }

    header {
      display: none !important;
      visibility: hidden !important;
    }

    table {
      margin: 2px;
      font-size: 9px;
      table-layout: fixed;
      width: 100%;
      word-break: break-all
    }

    .btn {
    
      width: auto;
      height: 25px;
      font-size: 10px;
    }

    th,
    td {
      padding: 0px 0px;
    }

    a {
      opacity: 0;
    }

  }

  </style>

<body>

<div class="container-manual">
<div class="btn-grp">
<button type="submit" class="btn btn-primary" onclick="window.location.href='ncp/registration.php';">NCP Registration</button>
<button type="submit" class="btn btn-primary" onclick="window.location.href='ncp/ncplogin.php';">NCP Login</button>
<button type="submit" class="btn btn-primary"onclick="window.location.href='cc/cclogin.php';">CC Login</button>
    </div>
  <h1>Leaderboard</h1>
  
<?php
if (mysqli_num_rows($result) > 0 ) {
?>
<form action="leaderboard.php" method="post">
  <table class="table  table-hover">
  
  <tr>
    <th>Rank</th>
    <th>College Code</th>
    <th>Points</th>
  </tr>
<?php




$i=0;
$rank = 1;
// while($rank <=$rank){
while($row = mysqli_fetch_array($result)) {
        
?>
<tr>
    <td><?php echo $rank; ?></td>
    <td><?php echo $row["college_code"]; ?></td>
    <td><?php echo $row["points"]; ?></td>
	

</tr>
<?php
$i++;
$rank++;
// }
}
?>
</table>
 <?php

}
else{
    echo "No result found";
}
?>

</form>
</div>
 </body>
</html>