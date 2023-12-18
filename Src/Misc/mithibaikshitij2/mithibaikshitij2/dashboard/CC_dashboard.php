<?php
require_once "../includes/config.php";
session_start();
$loginuser = $_SESSION['ccid'];
// echo $loginuser;
$sql = "select cceventregi.ccid,cceventregi.participant_name,cclogin.email,cceventregi.college_name,cceventregi.phone_number,cceventregi.event_name,cceventregi.status from cceventregi, cclogin where cceventregi.ccid = '$loginuser' and cclogin.userid ='$loginuser'";
// select cceventregi.ccid,cceventregi.participant_name,cclogin.email,cceventregi.college_name,cceventregi.phone_number,cceventregi.dept_name,cceventregi.event_name,cceventregi.attachment,cceventregi.status,cceventregi.timeofregistration, cceventregi.idproof from cceventregi, cclogin where cceventregi.ccid = cclogin.userid and event_name='$event';";
$result = mysqli_query($conn, $sql);

$bet_sql = "select event_name, event_type, bet_point, result from bets where ccid = '$loginuser'";
$bet_result = mysqli_query($conn, $bet_sql);

$event_regi_sql = "select ccid, event_name, points,result from cc_regi_point where ccid = '$loginuser'";
$event_regi_result = mysqli_query($conn, $event_regi_sql);

$score_sql = "select points from leaderboard where college_code = '$loginuser'";
$score_result = mysqli_query($conn, $score_sql);

$rank_sql = "select college_code, rank() OVER ( order by points desc ) as 'rank' from leaderboard;";
$rank_result = mysqli_query($conn, $rank_sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../assets/fav.png" type="image/x-icon"> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CC Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="../Global1.css">
</head>
<?php

if (!isset($_SESSION['ccloggedin'])) {
  header("location:../CC/cclogin.php");
  exit;
}

?>
<style>
  .container-manual{
    width:70%;
    margin:0 auto;
  }
  .main{
    display:flex;
   
  }
  body {
    max-width: 100%;
    font-family: "Trirong";
    background: url(../assets/bg.jpg);
    background-repeat: none;
    background-size: cover;
    background-attachment: fixed;
  }

  table {
    margin: 10px;
    font-family: "Trirong";
    max-width: 95%;
    border: none;
  }

  .score {
    font-weight: bold;
    text-align: center;
    color: white;
  }

  .cols {
    display: flex;
    flex-direction: column;

  }

  th {
    background-color: #087f5b;
    color: black;
    /* width: 25%; */
    font-weight: 800;
  }

  th,
  td {
    color: black;
    border: 1px solid #343a40;
    padding: 16px 24px;
    text-align: left;

    /* border:none; */

  }

  td a {
    text-decoration: none;
    color: white;
  }


  tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
  }


  tbody tr:nth-child(even) {
    background-color: #e9ecef;
  }

  .main {
    display: flex;
    flex-direction: row;

  }

  .bg-dark {
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
}
</style>

<body>

  <header class="dashboard_1">
    <?php include "../global/cc_sidebar.php" ?>
  </header>
  
  <div class="container-manual">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <div class="cols">
      <div class="score">

        <?php
        if (mysqli_num_rows($score_result) > 0) {
          while ($row = mysqli_fetch_array($score_result)) {
            echo "Your Total Score is : " . $row['points'];
          }
        } elseif (mysqli_num_rows($score_result) < 0) {
          echo "Your Total Score is : 0";
        }
        ?>
        <br>
        <?php
        if (mysqli_num_rows($rank_result) > 0) {
          $m = 0;
          while ($row = mysqli_fetch_array($rank_result)) {
            if ($row['college_code'] == $loginuser) {
              echo "Your Rank is : " . $row['rank'];
            }
          }
        } elseif (mysqli_num_rows($rank_result) <= 0) {
          echo "Your Rank is not defined yet";
        }
        ?>
      </div>

      <?php
      if (mysqli_num_rows($result) > 0) {
      ?>
        <form>
          <table class="table">

            <tr>
              <td>CC ID</td>
              <td>Participant Name</td>
              <td>Email Id</td>
              <td>College Name</td>
              <td>Phone no.</td>
              <td>Event Name</td>
              <td>Status</td>
              <td>Action</td>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $row["ccid"]; ?></td>
                <td><?php echo $row["participant_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["college_name"]; ?></td>
                <td><?php echo $row["phone_number"]; ?></td>
                <!-- <td><?php echo $row["dept_name"]; ?></td> -->
                <td><?php echo $row["event_name"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <!-- <td><?php echo $row["timeofregistration"]; ?></td> -->
                <td><?php echo "<button class='btn btn-primary'><a href='../events/ccsubstitute.php'>Substitute</a></button> " ?></td>
              </tr>
            <?php
              $i++;
            }
            ?>
          </table>
        <?php
      } else {
        echo "<h2>You have not registered for any event</h2>";
      }
        ?>
        <!-- <a class="btn btn-primary" href="NCP_departments.php" role="button">Click here to Register</a> -->

        </form>
        <br>
        <?php
        if (mysqli_num_rows($bet_result) > 0) {
        ?>
          <form>
            <table class="table">

              <tr>
                <td>Event Name</td>
                <td>Event Type</td>
                <td>Points Betted</td>
                <td>Result</td>
              </tr>
              <?php
              $ii = 0;
              while ($row = mysqli_fetch_array($bet_result)) {

              ?>
                <tr>
                  <td><?php echo $row["event_name"] ?></td>
                  <td><?php echo $row["event_type"]; ?></td>
                  <td><?php echo $row["bet_point"]; ?></td>
                  <td><?php echo $row["result"]; ?></td>


                </tr>
              <?php
                $ii++;
              }
              ?>
            </table>
          <?php

        } else {
          echo "No Bets Placed Yet";
        }
          ?>
          </form>


          <!-- points by event regi table -->
          <?php
          if (mysqli_num_rows($event_regi_result) > 0) {
          ?>
            <form>
              <table class="table">

                <tr>
                  <td>CCID</td>
                  <td>Event Name</td>
                  <td>Points</td>
                  <td>Result</td>
                </tr>
                <?php
                $iii = 0;
                while ($row = mysqli_fetch_array($event_regi_result)) {

                ?>
                  <tr>
                    <td><?php echo $row["ccid"] ?></td>
                    <td><?php echo $row["event_name"]; ?></td>
                    <td><?php echo $row["points"]; ?></td>
                    <td><?php echo $row["result"]; ?></td>
                  </tr>
                <?php
                  $iii++;
                }
                ?>
              </table>
            <?php

          } else {
            echo "No Bets Placed Yet";
          }
            ?>
            </form>
    </div>
  </div>
</body>

</html>