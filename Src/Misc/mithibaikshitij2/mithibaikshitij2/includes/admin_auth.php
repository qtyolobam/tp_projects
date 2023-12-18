<?php
  session_start();
  if(!isset($_SESSION['Admin_loggedin']))
  {
      header("location:https://mithibaikshitij.com/");
      exit;
  }

?> 