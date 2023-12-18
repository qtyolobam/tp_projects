<!DOCTYPE html>
<html lang="en">
<head>
     <!--  meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>ERROR - Page Not Found</title>
    <link rel="stylesheet" href="Global.css"> 

    <link rel="icon" href="assets/fav.png" type="image/x-icon">
</head>
<style>
    img{
        width:400px;
    }
    .container{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items: center;

    }
    h1{
        font-size: 75px;
        color: #ffffff;
    }

    @media only screen and (max-width: 600px) {
        img{
            width:200px;
        }
        .container{
            display:flex;
        flex-direction:column;
        justify-content:center;
        align-items: center;
        }
    }

    </style>
<body>

    <div class="container">
        <img src="assets/logo.png" />
        <br>
        <br>
        <h1 style="text-align:center;">404 Error</h1>
        <h3 style="text-align:center;">Page Not Found!</h3>
        <p style="text-align:center;">The Requested URL could not be found on the server!</p>
        <p><a href="index.php">Home Page</p>
    </div>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>