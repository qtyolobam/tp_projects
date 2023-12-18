<?php
require_once "../../includes/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $event=$_POST['events'];
        $zzz = $_POST['result'];
        $cc = $_POST['cc'];
        $betyn=$_POST['betyn'];
        
        echo "event name is ".$event." result selected is ".$zzz." cc selected is ".$cc;
        $bet_point_sql = "select bet_point from bets where ccid = '$cc' and event_name='$event'";
        $bet_point_result =mysqli_query($conn,$bet_point_sql);
        echo "betyn is".$betyn;


        $status_sql = "select result from cc_regi_point where ccid = '$cc' and event_name='$event'";
        $status_result =mysqli_query($conn,$status_sql);
        while($status_result_row = mysqli_fetch_array($status_result))
        {

        if($betyn == $cc){
        while($data = mysqli_fetch_array($bet_point_result))
        {
          $pt2 = 2*$data['bet_point'];
          $pt = $data['bet_point'];
          
        
            echo "this is fromm iff";

        if ($zzz == "podium_1" || $zzz == "podium_2" || $zzz == "podium_3"){
          echo "kunal podium 1,2,3";
          $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') + $pt2 WHERE college_code = '$cc';";  // Use select query here          
          $sql1 = "update bets set result = '$zzz' where ccid = '$cc' and event_name='$event'";  
          if($conn->query($sql) == true){
                
                echo "Hogya";
                //  header("location: ncpregisteredevents.php");
              }
              else{
                    echo "ERROR: $sql <br> $conn->error";
                }
                if($conn->query($sql1) == true){
                
                  echo "Hogya";
                  //  header("location: ncpregisteredevents.php");
                }
                else{
                      echo "ERROR: $sql1 <br> $conn->error";
                  } 
        }
        
        elseif($zzz == "loss"){
          //check event type
          $event_type_sql = "select event_type from events where event_name = '$event'"; // fetching event type;
          $event_type_result = mysqli_query($conn,$event_type_sql);
          while($event_type_row = mysqli_fetch_array($event_type_result)){
          if ($event_type_row['event_type']=='Flagship '){
            echo $pt;
            $pt = 2*$data['bet_point'];
            $pt2 = $data['bet_point'];
            $sql2 = "update leaderboard set points = points - $pt where college_code = '$cc'";
            $sql1 = "update bets set result = 'Loss' where ccid = '$cc' and event_name='$event'";
            $sql3 = "update cc_regi_point set result = 'Loss' where ccid='$cc' and event_name = '$event'";
            if($conn->query($sql2) == true){
            echo "lossssss Hogya";
                    }
            else{
                  echo "ERROR: $sql2 <br> $conn->error";
              } 
              if($conn->query($sql1) == true){
                echo "Hogya";

              }
              else{
                    echo "ERROR: $sql1 <br> $conn->error";
                }
              if($conn->query($sql3) == true){
                echo "Hogya";

              }
              else{
                    echo "ERROR: $sql3 <br> $conn->error";
                }
          }
          elseif ($event_type_row['event_type'] != 'Flagship '){
            $pt = 2*$data['bet_point'];
            $pt2 = $data['bet_point'];
            echo $pt2;
            $sql2 = "update leaderboard set points = points - $pt2 where college_code = '$cc'";
            $sql1 = "update bets set result = 'Loss' where ccid = '$cc' and event_name='$event'";
            $sql3 = "update cc_regi_point set result = 'Loss' where ccid='$cc' and event_name = '$event'";
                if($conn->query($sql2) == true){
                    echo "lossssss Hogya";
                }
                else{
                echo "ERROR: $sql2 <br> $conn->error";
                } 
                if($conn->query($sql1) == true){
                  echo "Hogya";
                }
                else{
                      echo "ERROR: $sql1 <br> $conn->error";
                }
                if($conn->query($sql3) == true){
                  echo "Hogya";
                }
                else{
                      echo "ERROR: $sql3 <br> $conn->error";
                }
            }

          }
          $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
            if($conn->query($sql) == true){
                
                echo "Hogya";
                //  header("location: ncpregisteredevents.php");
              }
              else{
                    echo "ERROR: $sql <br> $conn->error";
                } 

                $sql = "update cc_regi_point SET result = 'loss' WHERE ccid = '$cc' and event_name = '$event' ;";  // Use select query here          
                if($conn->query($sql) == true){
                    
                    echo "Hogya";
                    //  header("location: ncpregisteredevents.php");
                  }
                  else{
                        echo "ERROR: $sql <br> $conn->error";
                    }
        }

        elseif($zzz == "NPR" || $zzz == "NPQ" || $zzz == "Qualification"){
          echo "kunal npr npq quali";
          $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
            if($conn->query($sql) == true){
                echo "Hogya";
                //  header("location: ncpregisteredevents.php");
              }
              else{
                    echo "ERROR: $sql <br> $conn->error";
                } 
        }

      }//while
      }//if closing 

      elseif ($betyn==""){
        if ($status_result_row['result'] == "Result Awaited"){
        echo "hellllllllooooooop";
        if($zzz == "NPR"){
          $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
          if($conn->query($sql) == true){                
            echo "Hogya";
          }
          else{
                echo "ERROR: $sql <br> $conn->error";
            }

          $sql1 = "update cc_regi_point SET result = '$zzz' WHERE ccid = '$cc' and event_name = '$event' ;";  // Use select query here          
          if($conn->query($sql1) == true){
              
              echo "Hogya";
              //  header("location: ncpregisteredevents.php");
            }
            else{
                  echo "ERROR: $sql1 <br> $conn->error";
              }
          }

          //elseif for qualification
          elseif($zzz=="Qualification"){
            $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
            if($conn->query($sql) == true){                
              echo "Hogya";
            }
            else{
                  echo "ERROR: $sql <br> $conn->error";
              }
  
            $sql1 = "update cc_regi_point SET result = '$zzz' WHERE ccid = '$cc' and event_name = '$event' ;";  // Use select query here          
            if($conn->query($sql1) == true){
                
                echo "Hogya";
                //  header("location: ncpregisteredevents.php");
              }
              else{
                    echo "ERROR: $sql1 <br> $conn->error";
                }
            }
        
          }

          elseif ($status_result_row['result'] == "Qualification"){
            echo "hellllllllooooooop";
            if($zzz == "NPQ"){
              $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
              if($conn->query($sql) == true){                
                echo "Hogya";
              }
              else{
                    echo "ERROR: $sql <br> $conn->error";
                }
    
              $sql1 = "update cc_regi_point SET result = '$zzz' WHERE ccid = '$cc' and event_name = '$event' ;";  // Use select query here          
              if($conn->query($sql1) == true){
                  
                  echo "Hogya";
                  //  header("location: ncpregisteredevents.php");
                }
                else{
                      echo "ERROR: $sql1 <br> $conn->error";
                  }
              }

          elseif($zzz == "podium_1" || $zzz == "podium_2" || $zzz == "podium_3" || $zzz == "loss"){
                $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
                if($conn->query($sql) == true){                
                  echo "Hogya";
                }
                else{
                      echo "ERROR: $sql <br> $conn->error";
                  }
      
                $sql1 = "update cc_regi_point SET result = '$zzz' WHERE ccid = '$cc' and event_name = '$event' ;";  // Use select query here          
                if($conn->query($sql1) == true){
                    
                    echo "Hogya";
                    //  header("location: ncpregisteredevents.php");
                  }
                  else{
                        echo "ERROR: $sql1 <br> $conn->error";
                    }
                }

              elseif($zzz == "Qualification"){
                echo "<script>alert('You Have already given Qualification to this $cc')</script>"; 
              }
          }
    
          elseif ($status_result_row['result'] == "podium_1"){
            if($zzz){
              echo "<script>alert('You Have already given Podium 1 to this $cc')</script>"; 
            }
          }
          elseif ($status_result_row['result'] == "podium_2"){
            if($zzz){
              echo "<script>alert('You Have already given Podium 2 to this $cc')</script>"; 
            }
          }
          elseif ($status_result_row['result'] == "podium_3"){
            if($zzz){
              echo "<script>alert('You Have already given Podium 3 to this $cc')</script>"; 
            }
          }
          elseif ($status_result_row['result'] == "loss"){
            if($zzz){
              echo "<script>alert('You Have already given Loss to this $cc')</script>"; 
            }
          }
          elseif ($status_result_row['result'] == "NPR"){
            if($zzz){
              echo "<script>alert('You Have already given NPR to this $cc')</script>"; 
            }
          }

          elseif ($status_result_row['result'] == "NPQ"){
            if($zzz){
              echo "<script>alert('You Have already given NPQ to this $cc')</script>"; 
            }
          }

              
              
      }
      
    }      
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
    <title>Registration Form</title>

    <style>
        .form-label{
            width:15rem;
        }
    </style>
</head>
<?php
session_start();
if(!isset($_SESSION['Admin_loggedin']))
{
    header("location:../../leaderboard.php");
    exit;
}
?>
<body>

        <form action="result.php" method='post'>
        
        <div class="form-group">
    <label class="control-label col-sm-2">Department</label>
    <div class="col-sm-4">
      <select class="form-control departments" name="departments">
       <option value="">--Select--</option>
     </select>
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2">Events</label>
  <div class="col-sm-4">
   <select class="form-control events" name="events">
     <option value="">--Select--</option>
   </select>
 </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">College Code</label>
  <div class="col-sm-4">
   <select class="form-control cc" name="cc">
     <option value="">--Select--</option>
   </select>
 </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2">Bet Placed or Not</label>
  <div class="col-sm-4">
   <select class="form-control betyn" name="betyn">
     <option value="">--Select--</option>
   </select>
 </div>
 </div>


            <div class="mb-3" id="actions">
            <input type="radio" id="NPR" name="result" value="NPR">
            <label for="NPR">NPR</label><br>
            <input type="radio" id="NPQ" name="result" value="NPQ">
            <label for="NPQ">NPQ</label><br>
            <input type="radio" id="Qualification" name="result" value="Qualification">
            <label for="Qualification">Qualification</label><br>
            <input type="radio" id="podium_1" name="result" value="podium_1">
            <label for="NPR">1<sup>st</sup> Podium</label><br>
            <input type="radio" id="podium_2" name="result" value="podium_2">
            <label for="NPQ">2<sup>nd</sup> Podium</label><br>
            <input type="radio" id="podium_3" name="result" value="podium_3">
            <label for="podium_3">3<sup>st</sup> Podium</label><br>
            <input type="radio" id="loss" name="result" value="loss">
            <label for="loss">Loss</label>
            </div>
            <button type="submit" name="sb2" class="btn btn-primary">Submit</button>

            

        </form>

        <script type="text/javascript">
	
  $(document).ready(function(){


    /*Get the country list */

      $.ajax({
        type: "GET",
        url: "get_departments.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $('.departments').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.departments').find("option:eq(0)").html("Select Department");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.departments').append(option);
         });  

          /*ends */
          
        }
      });



    /*Get the state list */


    $('.departments').change(function(){
      $.ajax({
        type: "POST",
        url: "get_events.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".events option:gt(0)").remove(); 
      $(".cc option:gt(0)").remove(); 
      $('.events').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('.events').find("option:eq(0)").html("Select Event");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.events').append(option);
         });  

          /*ends */
          
        }
      });
    });




    /*Get the state list */


    $('.events').change(function(){
      $.ajax({
        type: "POST",
        url: "get_cc.php",
        data:{id:$(this).val()}, 
          beforeSend :function(){
   
      $(".cc option:gt(0)").remove(); 
      $('.cc').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.cc').find("option:eq(0)").html("Select CC");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);
           $('.cc').append(option);
         });  
          
          /*ends */
          
        }
      });
    });

    $('.events').change(function(){
      $.ajax({
        type: "POST",
        url: "get_bet_cc.php",
        data:{id:$(this).val()}, 
          beforeSend :function(){
   
      $(".betyn option:gt(0)").remove(); 
      $('.betyn').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.betyn').find("option:eq(0)").html("Select Betted CC");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);
           $('.betyn').append(option);
         });  
          
          /*ends */
          
        }
      });
    });




  });





</script>


</body>
</html>