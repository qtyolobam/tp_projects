<?php
require_once "../includes/config.php";

include 'cc_status.php';
$sql = "select cceventregi.ccid,cceventregi.participant_name,cceventregi.email_id,cceventregi.college_name,cceventregi.phone_number,cceventregi.dept_name,cceventregi.event_name,cceventregi.attachment,cceventregi.status,cceventregi.timeofregistration, cceventregi.idproof,cceventregi.govt_id,cceventregi.update_count from cceventregi, cclogin where cceventregi.ccid = cclogin.userid;";
$result = mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html>
 <head>
 <link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
   <!--  meta tags -->
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Global1.css"> 
 <title> CC Registered Events</title>
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

      button{
        text-align:center;
        align-items:center;
      }

  </style>
<?php
    
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

  <div class="container-manual">
      <?php
      if (mysqli_num_rows($result) > 0 ) {
      ?>

      <form action="ccregisteredevents.php" method="post">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table">
        <thead>
        <tr>
        <td>CC ID</td>
        <td>Participant Name</td>
          <td>Email Id</td>
          <td>College Name</td>
          <td>Phone no.</td>
        <td>Department Name</td>
        <td>Event Name</td>
        <td>Attachment</td>
        <td>Status</td>
        <td>Time of Registration</td>
        <td>Action</td>
        <td>Waiting</td>
        <td>College Id / Fee Receipt</td>
        <td>Govt. Id</td>
        <td>Slot Update</td>
        </tr>
        </thead>
        

      <tbody id="myTable">
      <?php




      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>
      <tr>
          <td><?php echo $row["ccid"]; ?></td>
          <td><?php echo $row["participant_name"]; ?></td>
          <td><?php echo $row["email_id"]; ?></td>
          <td><?php echo $row["college_name"]; ?></td>
        <td><?php echo $row["phone_number"]; ?></td>
        <td><?php echo $row["dept_name"]; ?></td>
        <td><?php echo $row["event_name"]; ?></td>
        <td><a href="https://<?php echo $row["attachment"]; ?>" target="_blank">Link</a></td>
        <td><?php echo $row["status"]; ?></td>
        <td><?php echo $row["timeofregistration"]; ?></td>
        <td>
        <form action='cc_status.php' method='POST'> 
        <input type='hidden' name='email' value="<?php echo $row['email_id']; ?>"> 
        <input type='hidden' name='ccid' value="<?php echo $row["ccid"]; ?>">
        <input type='hidden' name='eventname' value="<?php echo $row["event_name"]; ?>">
        <button type="submit" class="btn btn-primary" style="font-size:8px; text-align:center; padding: 2px 2px; width:60px;">Confirm Slot</button>
        <!-- <input type='button' name='btn' form action='status.php' value='Approve'/> -->
        </form>
      </td>

      <td>
        <form action='cc_waiting.php' method='POST'> 
        <input type='hidden' name='email' value="<?php echo $row['email_id']; ?>">
        <input type='hidden' name='ccid' value="<?php echo $row["ccid"]; ?>">
        <input type='hidden' name='eventname' value="<?php echo $row["event_name"]; ?>">
        <button type="submit" class="btn btn-primary" style="font-size:8px; text-align:center; padding: 2px 2px; width:60px" >Waiting</button>
        <!-- <input type='button' name='btn' form action='status.php' value='Approve'/> -->
        </form>
      </td>

        <!-- <img src="../uploads/03-36-56pm%202021-10-01kunal.jpg" alt="myimage"> -->
        <!-- <td> <a href="<?php echo $row['idproof'];?>" target="_blank">View</a>  </td> -->
        <?php $idproof = $row["idproof"];
          // echo $idproof;
          $links = explode(" ", $idproof);
          //echo count($links);
        ?>
        <td> <?php 
        $len = count($links);
        $i=0;
        while ($i < $len)
              {
                  $link="../uploads/".$links[$i];
                  $i++;
                  echo "<a href='$link' target='_blank'>View<br></a>";
              }
      ?></td>
<?php $govt_idproof = $row["govt_id"];
    $links1 = explode(" ", $govt_idproof);
  ?>
  <td> <?php 
  $len1 = count($links1);
  $ii=0;
  while ($ii < $len1)
        {
            $link1="../uploads/".$links1[$ii];
            $ii++;
            echo "<a href='$link1' target='_blank'>View<br></a>";
        }
 ?></td>


      <td><?php echo $row["update_count"]; ?></td>
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