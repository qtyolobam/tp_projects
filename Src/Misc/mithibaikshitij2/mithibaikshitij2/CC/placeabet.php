<?php
require_once "../includes/config.php";
session_start();
$loginuser = $_SESSION['ccid'];
// echo $loginuser;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $betpoint = $_POST['betpoint'];
    $event = $_POST['events'];
    // echo $betpoint . $event;
    $sql = "select event_name from events where event_type='USP';"; // fetching event name where event type is USP
    $result = mysqli_query($conn, $sql);

    $event_type_sql = "select event_type from events where event_name = '$event'"; // fetching event type;
    $event_type_result = mysqli_query($conn, $event_type_sql);

    $sql1 = "select count(*) from bets where event_type=(select event_type from events where event_name = '$event') and ccid = '$loginuser'"; // counting how many bets are placed on based on type of events
    $result1 = mysqli_query($conn, $sql1);

    $event_date_sql = "select event_date from events where event_name='$event'"; //fetching event date 
    $event_date_result = mysqli_query($conn, $event_date_sql);
    while ($event_date_row = mysqli_fetch_array($event_date_result)) {
        $event_date = $event_date_row['event_date'];
    }
    date_default_timezone_set('Asia/Kolkata');
    function curdate() {
        return date('Y-m-d h:m:s');
    }
    
    $gap =  strtotime($event_date) - strtotime(curdate()); 

    $check_bet_sql = "select count(*) from bets where ccid = '$loginuser' and event_name = '$event'";
    $check_bet_result = mysqli_query($conn, $check_bet_sql);

    while ($check_bet_row = mysqli_fetch_array($check_bet_result)) {
        $betcount = $check_bet_row['count(*)'];
    }

    while ($data = mysqli_fetch_array($result)) {
        $event_n[] = $data['event_name'];
    }
    if (in_array($event, $event_n)) {
        // echo "Hey You have selected a USP type event !";
        echo '<script>alert("Hey You have selected a USP type event !")</script>';
    } elseif (!in_array($event, $event_n)) {
        if ($betcount < 1) {
            while ($event_type_row = mysqli_fetch_array($event_type_result)) {
                while ($sql1_row = mysqli_fetch_array($result1)) {
                
                    if (intval($gap) >= 900){
                        // echo '<script>alert("$cur_date->i")</script>';
                    if ($event_type_row['event_type'] == "Flagship" && $sql1_row['count(*)'] < 1) {
                        $sql = "INSERT INTO bets (ccid,event_name,event_type,bet_point) VALUES ('$loginuser','$event',(select event_type from events where event_name = '$event'), $betpoint);";
                        if ($conn->query($sql) == true) {
                            echo '<script>alert("Bet Placed Successfully")</script>';

                        } else {
                            echo '<script>alert("error")</script>';

                        }
                    } elseif ($event_type_row['event_type'] == "Popular" && $sql1_row['count(*)'] < 2) {
                        $sql = "INSERT INTO bets (ccid,event_name,event_type,bet_point) VALUES ('$loginuser','$event',(select event_type from events where event_name = '$event'), $betpoint);";
                        if ($conn->query($sql) == true) {
                            echo '<script>alert("Bet Placed Successfully")</script>';
                        } else {
                            echo '<script>alert("error")</script>';

                        }
                    } elseif ($event_type_row['event_type'] == "Others" && $sql1_row['count(*)'] < 3) {
                        $sql = "INSERT INTO bets (ccid,event_name,event_type,bet_point) VALUES ('$loginuser','$event',(select event_type from events where event_name = '$event'), $betpoint);";
                        if ($conn->query($sql) == true) {
                            echo '<script>alert("Bet Placed Successfully")</script>';
                        } else {
                        echo '<script>alert("error")</script>';
                            
                        }
                    } else {
                        // echo "You have already placed bets !!";
                        echo '<script>alert("You have already placed bets !!")</script>';

                    }
                }
                else{
                    echo '<script>alert("Betting Time Over !!")</script>';
                }
            }
            }
        } else {
            // echo "you have already placed on this event";
            echo '<script>alert("you have already placed bet on this event")</script>';

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Global1.css">

    <title>Place A Bet</title>

</head>
<?php

if (!isset($_SESSION['ccloggedin'])) {
    header("location:../CC/cclogin.php");
    exit;
}

?>
<style>
           @media only screen and (max-width: 600px) {
    
    body{
display:flex;
flex-direction:column;
background-repeat: none;
background-size: cover;
background-attachment: fixed;
text-align: center;
}

p{
font-size: 15px;
}
.container-manual {
width: 80%;
padding: 20px 20px;
border-radius:10px;

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
}
    </style>
<body>

    <header class="dashboard">
      <?php include "../global/cc_sidebar.php" ?>
    </header>

    <div class="container-manual">
        <h1>Place A Bet</h1>
        <form action="placeabet.php" method='post'>
            <div class="form-group mb-3">
                <label class="control-label">Events</label>
                <div class="mb-3">
                    <select name="events" required>
                        <option value="">--Select--</option>
                        <?php
                        // $records = mysqli_query($db, "SELECT city_name From tblcity");  // Use select query here 
                        $date = date('Y-m-d');
                        $sql = "select cceventregi.event_name FROM cceventregi WHERE cceventregi.ccid = '$loginuser' and status = 'confirmed' 
                        INTERSECT SELECT event_name from events where event_date like '$date%' ;";
                        $records = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($records)) {
                            echo "<option value='" . $data['event_name'] . "'>" . $data['event_name'] . "</option>";  // displaying data in option menu
                        }
                        ?>
                    </select>
                    <label class="control-label">Bet Points</label>
                    <select name="betpoint" required>
                        <option value="">--Select--</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                        <option value="110">110</option>
                        <option value="120">120</option>
                        <option value="130">130</option>
                        <option value="140">140</option>
                        <option value="150">150</option>
                        <option value="160">160</option>
                        <option value="170">170</option>
                        <option value="180">180</option>
                        <option value="190">190</option>
                        <option value="200">200</option>
                        <option value="210">210</option>
                        <option value="220">220</option>
                        <option value="230">230</option>
                        <option value="240">240</option>
                        <option value="250">250</option>
                        <option value="260">260</option>
                        <option value="270">270</option>
                        <option value="280">280</option>
                        <option value="290">290</option>
                        <option value="300">300</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="sb2" class="btn btn-primary">Submit</button>



        </form>
    </div>
</body>

</html>