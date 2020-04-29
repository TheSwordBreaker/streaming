<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.css.min">

    <script src="js/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
                <img src="img/server.png" alt="server" height="60px" width="80px" style="position:relative; left:0px; float:left; ">
                <a class="navbar-brand" href="index.php">Cloud Storage </a> 
                
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    


                </ul>
            <div id="nav-changed">
                <ul class="nav navbar-nav navbar-right">
                    <li style="display: none"  id="signup"><a href="SignUp.php">Sign up</a></li>
                    <li style="display: none"  id="login"><a href="Login.php">Log in</a></li>
                    <li style="display: none" id="logout"><a href="home.php">Log out</a></li>
                </ul>
            </div>
           

            </div>
        </div>
    </nav>