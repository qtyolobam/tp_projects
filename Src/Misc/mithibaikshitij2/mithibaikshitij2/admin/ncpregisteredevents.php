<?php
require_once "../includes/config.php";

include 'status.php';
$sql = "select ncpeventregi.ncpid,ncpeventregi.participant_name,pi_regi.email,pi_regi.collegename,ncpeventregi.mobilenum,pi_regi.dob,ncpeventregi.dept_name,ncpeventregi.event_name,ncpeventregi.attachment,ncpeventregi.status,ncpeventregi.timeofregistration, ncpeventregi.idproof, ncpeventregi.govt_id, ncpeventregi.update_count from ncpeventregi, pi_regi where ncpeventregi.ncpid = pi_regi.NCPID;";
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
    
    
 <title>NCP Registered Events</title>
 </head>
<style>
  .container-manual{
    font-size: 14px;
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

<form action="ncpregisteredevents.php" method="post">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table">
  <thead>
  <tr>
    <td>NCP ID</td>
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
  <td>College Id/ Fee Receipt </td>
  <td>Govt Id</td>
  <td>Slot Update</td>
  </tr>
</thead>
<tbody id="myTable">
<?php




$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["ncpid"]; ?></td>
    <td><?php echo $row["participant_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["collegename"]; ?></td>
	<td><?php echo $row["mobilenum"]; ?></td>
	<td><?php echo $row["dept_name"]; ?></td>
	<td><?php echo $row["event_name"]; ?></td>
  <td><a href="https://<?php echo $row["attachment"]; ?>" target="_blank">Link</a></td>
  <td><?php echo $row["status"]; ?></td>
  <td><?php echo $row["timeofregistration"]; ?></td>
  <td>
  <form action='status.php' method='POST'>
  <input type='hidden' name='email' value="<?php echo $row['email']; ?>"> 
  <input type='hidden' name='status' value="<?php echo $row['status']; ?>">
  <input type='hidden' name='ncpid' value="<?php echo $row['ncpid']; ?>">
  <input type='hidden' name='eventname' value="<?php echo $row['event_name']; ?>">
  
  <button type="submit" class="btn btn-primary" style="font-size:8px; text-align:center; padding: 2px 2px; width:60px;">Confirm Slot</button>
  <!-- <input type='button' name='btn' form action='status.php' value='Approve'/> -->
  </form>
</td>

<td>
  <form action='waiting.php' method='POST'>
  <input type='hidden' name='email' value="<?php echo $row['email']; ?>"> 
  <input type='hidden' name='status' value="<?php echo $row['status']; ?>"> 
  <input type='hidden' name='ncpid' value="<?php echo $row["ncpid"]; ?>">
  <input type='hidden' name='eventname' value="<?php echo $row["event_name"]; ?>">
  <button type="submit" class="btn btn-primary" style="font-size:8px; text-align:center; padding: 2px 2px; width:60px;">Waiting</button>
  <!-- <input type='button' name='btn' form action='status.php' value='Approve'/> -->
  </form>
</td>

  <!-- <img src="../uploads/03-36-56pm%202021-10-01kunal.jpg" alt="myimage"> -->
  <!-- <td> <a href="<?php echo $row['idproof'];?>" target="_blank">View</a>  </td> -->
  <?php $idproof = $row["idproof"];
    // echo $idproof;
    $links = explode(" ", $idproof);
    // echo count($links);
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