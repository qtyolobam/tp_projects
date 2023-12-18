<?php
require_once "../../includes/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $event=$_POST['event_name'];
        $zzz = $_POST['result'];
        $ccid = $_POST['cc'];

        echo "you have selectedd".$ccid.$event.$zzz;
        $bet_point_sql = "select bet_point from bets where ccid = '$ccid' and event_name='$event'";
        $bet_point_result =mysqli_query($conn,$bet_point_sql); 
        
        $event_type_sql = "select event_type from events where event_name = '$event'"; // fetching event type;
        $event_type_result = mysqli_query($conn,$event_type_sql);

        while($data = mysqli_fetch_array($bet_point_result))
        {
          while($event_type_row = mysqli_fetch_array($event_type_result)){
            $pt = 2*$data['bet_point'];
            $pt2 = $data['bet_point'];
            // echo $pt;
            echo $pt;
            if($zzz=="loss"){
              echo "<br> Event type is  ".$event_type_row['event_type'];
              
                
                if ($event_type_row['event_type']=='Flagship '){
                  echo $pt;
                  $pt = 2*$data['bet_point'];
                  $pt2 = $data['bet_point'];
                  $sql2 = "update leaderboard set points = points - $pt where college_code = '$ccid'";
                  $sql1 = "update bets set result = 'Loss' where ccid = '$ccid' and event_name='$event'";
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
                }
                elseif ($event_type_row['event_type'] != 'Flagship '){
                  $sql2 = "update leaderboard set points = points - $pt2 where college_code = '$ccid'";
                  $sql1 = "update bets set result = 'Loss' where ccid = '$ccid' and event_name='$event'";
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
                  }
                } 
            
        
            elseif ($zzz=="win"){
              $sql = "update leaderboard set points = points + $pt where college_code = '$ccid'";
              $sql1 = "update bets set result = 'Won' where ccid = '$ccid' and event_name='$event'";
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
            
            
      }
    //         $sql = "update `leaderboard` SET `points`= points + (SELECT $zzz from events where event_name = '$event') WHERE college_code = '$cc';";  // Use select query here          
    //         if($conn->query($sql) == true){
                
    //             echo "Hogya";
    //             //  header("location: ncpregisteredevents.php");
    //           }
    //           else{
    //                 echo "ERROR: $sql <br> $conn->error";
    //             } 
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

        <form action="betresult.php" method='post'>
        
        <div class="form-group">
    <label class="control-label col-sm-2">Event Name</label>
    <div class="col-sm-4">
      <select class="form-control event_name" name="event_name">
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
<!-- <div class="form-group">
  <label class="control-label col-sm-2">Points</label>
  <div class="col-sm-4">
   <select class="form-control points" name="points">
     <option value="">--Select--</option>
   </select>  
 </div> -->
 </div>
 <div class="mb-3" id="actions">
            <input type="radio" id="win" name="result" value="win">
            <label for="win">win</label><br>
            <input type="radio" id="loss" name="result" value="loss">
            <label for="loss">Loss</label><br>
            </div>
            <button type="submit" name="sb2" class="btn btn-primary">Submit</button>

            

        </form>

        <script type="text/javascript">
	
  $(document).ready(function(){

    /*Get the country list */

      $.ajax({
        type: "GET",
        url: "get_bet_events.php",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $('.event_name').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.event_name').find("option:eq(0)").html("Select Event Name");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.event_name').append(option);
         });  

          /*ends */
          
        }
      });




    /*Get the state list */


    $('.event_name').change(function(){
      $.ajax({
        type: "POST",
        url: "get_bet_cc.php",
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

    /*Get the bet points*/


    // $('.cc').change(function(){
    //   $.ajax({
    //     type: "POST",
    //     url: "get_bet_points.php",
    //     data:{id:$(this).val()}, 
    //       beforeSend :function(){
   
    //   $(".points option:gt(0)").remove(); 
    //   $('.points').find("option:eq(0)").html("Please wait..");

    //     },  

    //     success: function (data) {
    //       /*get response as json */
    //         $('.points').find("option:eq(0)").html("Select POINTs");

    //       var obj=jQuery.parseJSON(data);
    //       $(obj).each(function()
    //       {
    //        var option = $('<option />');
    //        option.attr('value', this.value).text(this.label);
    //        $('.points').append(option);
    //      });  
          
    //       /*ends */
          
    //     }
    //   });
    // });




  });





</script>


</body>
</html>