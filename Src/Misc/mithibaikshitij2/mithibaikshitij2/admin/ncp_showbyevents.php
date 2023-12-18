<?php
namespace Phppot;

use Phppot\DepartmentEvent;
require_once __DIR__ . '/../events/Model/DepartmentEvent.php';
$departmentEvent = new DepartmentEvent();
$departmentResult = $departmentEvent->getAllDepartment();
?>
<?php
require_once "../includes/config.php";
// $g = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $event = $_POST['event'];
    
    echo $event;
    // global $g ;
    // $g=$event;
    $sql = "select ncpeventregi.ncpid,ncpeventregi.participant_name,pi_regi.email,pi_regi.collegename,pi_regi.phone,pi_regi.dob,ncpeventregi.dept_name,ncpeventregi.event_name,ncpeventregi.attachment,ncpeventregi.status,ncpeventregi.timeofregistration, ncpeventregi.idproof from ncpeventregi, pi_regi where ncpeventregi.ncpid = pi_regi.NCPID and event_name='$event';";
    $result = mysqli_query($conn,$sql);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="ncp_showbyevents.css">

    <title>Registration Form</title>


    <!-- function for geetting -->
    <script src="../events/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getEvent(val) {
    $("#loader").show();
	$.ajax({
	type: "POST",
	url: "../events/ajax/get-department-event-ep.php",
	data:'department_id='+val,
	success: function(data){
		$("#event-list").html(data);
		//$("#loader").hide();
	}
	});
}
</script>
<!-- end of getting -->
</head>
<style>
    body{
    max-width:100%;
    font-family: "Trirong";
    background: #DFD5D5;
      }
  table{
    margin:10px;
    font-family: "Trirong";
    max-width:80%;
    border:none;
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
  padding: 16px 24px;
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

    form{
        font-family:"Trirong";
        margin: 20px;
    }
    label{
       font-size:20px; 
    }



    </style>
    <?php
    session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:../leaderboard.php");
      exit;
  }

?>

<body>

        <form action="ncp_showbyevents.php" method='post'>
        <div class="mb-3">
                <label for="deptname" class="form-label">Department Name</label>
                <select name="department"
                id="department-list" 
                onChange="getEvent(this.value);">
                <option value="" >Select Department</option>
                <?php
                foreach ($departmentResult as $department) {
                    ?>
                <option value="<?php echo $department["dept_id"]; ?>"><?php echo $department["dept_name"]; ?></option>
                <?php
                }
                ?>
                </select>
            </div>

            <!-- displaying events -->
            <div class="mb-3" id="event">
                <label>Event Name:</label><br /> 
                 <select name="event" id="event-list">
                <option value="">Select Event</option>
                </select>
            </div>
            
            <button type="submit"  class="btn btn-primary">Filter !</button>

        </form>



        <!-- table -->
        <?php
if (mysqli_num_rows($result) > 0 ) {
?>
<form action="ncp_showbyevents.php" method="post">
  <table class="table" name="mytable">
  
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
  <td>image </td>
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
	<td><?php echo $row["dept_name"]; ?></td>
	<td><?php echo $row["event_name"]; ?></td>
  <!-- <?php

  $_SESSION['xyz'] = $row["event_name"];
  ?>  -->
  <td><?php echo $row["attachment"]; ?></td>
  <td><?php echo $row["status"]; ?></td>
  <td><?php echo $row["timeofregistration"]; ?></td>
  <td>
  <form action='status.php' method='POST'> 
  <input type='hidden' name='ncpid' value=<?php echo $row["ncpid"]; ?>>
  <input type='hidden' name='eventname' value=<?php echo $row["event_name"]; ?>>
  <button type="submit" class="btn btn-primary" >Submit</button>
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

</tr>
<?php
$i++;
}
?>
</table>
<button id="exporttable" class="btn btn-primary">Export</button>
 <?php
}
else{
    echo "No result found";
}
?>
</form>
<!-- <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>
<SCRipt>
    $(function() {
$("#exporttable").click(function(e){
var table = $("#mytable");
if(table && table.length){
$(table).table2excel({
exclude: ".noExl",
name: "Excel Document Name",
filename: "BBBootstrap" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
fileext: ".xls",
exclude_img: true,
exclude_links: true,
exclude_inputs: true,
preserveColors: false
});
}
});

});
</SCRipt> -->

</body>
</html>