<?php
require_once "../../includes/config.php";

// include 'cc_status.php';
$sql = "select * from bets";
$result = mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html>
 <head>
 <link rel="icon" href="../../assets/fav.png" type="image/x-icon"> 
   <!--  meta tags -->
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../Global1.css"> 
 <title>Bet History</title>
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
  font-weight:800;
}
  th, td {
  color:black;
  border: 1px solid #343a40;
  padding: 16px 24px;
  text-align: left;

}


tbody tr:nth-child(odd){
        background-color: #f8f9fa;
      }

      
      tbody tr:nth-child(even){
        background-color: #e9ecef;
      }


  </style>
 <?php
    
  // if(!isset($_SESSION['Admin_loggedin']))
  // {
  //     header("location:../../index.php");
  //     exit;
  // }

?> 
<body>
  <header class="dashboard">
      <?php include "../admin_sidebar.php" ?>
  </header>

  <div class="container-manual">
      <?php
      if (mysqli_num_rows($result) > 0 ) {
      ?>

      <form>
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table">
        <thead>
        <tr>
        <td>CC ID</td>
        <td>Event Name</td>
          <td>Event Type</td>
          <td>Points</td>
          <td>Result</td>
        </tr>
        </thead>
        

      <tbody id="myTable">
      <?php




      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
          <td><?php echo $row["ccid"]; ?></td>
          <td><?php echo $row["event_name"]; ?></td>
          <td><?php echo $row["event_type"]; ?></td>
          <td><?php echo $row["bet_point"]; ?></td>
        <td><?php echo $row["result"]; ?></td>
      </tr>
      <?php
      $i++;
      }
      ?>
      </tbody>
      </table>
      <?php
      }
      else{
          echo "No result found";
      }
      ?>
      </form>

</div>





<!-- <script>document.addEventListener('contextmenu', event => event.preventDefault());</script>
<script>
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}
</script> -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 </body>
</html>