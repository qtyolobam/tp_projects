<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


</head>

<body>

<?php

session_start();
if(!isset($_SESSION['ccloggedin']))
{
    header("location:https://mithibaikshitij.com/");
    exit;
}

?>




    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
          <span class="fs-4">CC Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg> -->
              Dashboard
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg> -->
              Register Now
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg> -->
              Place A Bet
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg> -->
              My Score
            </a>
</li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            
            
            <li><a class="dropdown-item" href="../logout/logout.php">Log out</a></li>
          </ul>
        </div>
      </div>


  

    <h2>You have not registered for any event</h2>

    <a class="btn btn-primary" href="CC_departments.php" role="button">Click here to Register</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <?php
if (mysqli_num_rows($result) > 0) {
?>
<form action="ncpregisteredevents.php" method="post">
  <table class="table">
  
  <tr>
    <td>NCP ID</td>
	<td>Participant Name</td>
    <td>Email Id</td>
    <td>College Name</td>
    <td>Phone no.</td>
	<td>Department Name</td>
	<td>Event Name</td>
  <td>Status</td>
  <td>Time of Registration</td>
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
	<td><?php echo $row["dept_name"]; ?></td>
	<td><?php echo $row["event_name"]; ?></td>
  <td><?php echo $row["status"]; ?></td>
  <td><?php echo $row["timeofregistration"]; ?></td>
  <!-- <td><?php echo "<button class='btn btn-primary'  type='submit' >Confirm</button>" ?></td> -->
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
</body>

</html>