<?php
    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();
    $user = new user();
?>

<html>
    <head>
        <?php
            if(isset($_SESSION['userdata']['username']))  
            {
                echo "<h3>Hello <b>" .$_SESSION['userdata']['username']. "</b> </h3>";
            }
            else
            {
                echo "<h3>You are not logged In</h3>";
            }
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/infopage.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <!-- ICON -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>CedCab</title>
        <script src="cabbook.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand -->
                <a href="customerDash.php" class="navbar-brand pl-5"><span class="text-white diff">Ced Cab</span></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>     

                <!-- Links -->
                <ul class="navbar-nav">
                
                    <li class="nav-item">
                        <a class="nav-link" href="infopage.php">Account Info</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Rides
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="pendingrides.php">Pending Rides</a>
                            <a class="dropdown-item" href="completedrides.php">Completed Rides</a>
                            <a class="dropdown-item" href="allrides.php">All Rides</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Account
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="update.php">Update Info</a>
                            <!-- <a class="dropdown-item" href="#">Change Password</a> -->
                        </div>
                    </li>

                    <li class="nav-item float-right">
                        <a class="nav-link" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="pic row ml-0">

            <div class="container">
                <h2 class="font-weight-bold pt-5 text-white text-center"> All Info </h2>
                <p class="text-white text-center">Showing your Total Fare, Total Ride And Your Upcoming Rides</p>
            </div>

            <!-- TILES -->
            <div> 
                <div class = "column" style = "background-color: #ed9537;">
                    <h3 class = "text-center">Total Fare Spent On CedCab</h3>
                    <h1 class="text-center text-danger">
                        <?php 
                            $user->total_fare($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #0cc71c;">
                    <h3 class="text-center">Your Total Rides With Us Are</h3>
                    <h1 class="text-center text-danger">
                        <?php 
                            $user->total_rides($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #ad1a29;">
                    <h3 class="text-center">Your Upcoming Rides</h3>
                    <h1 class="text-center text-info">
                        <?php 
                            $user->pending_rides($dbConnect->connect);
                        ?>
                    </h1>
                </div>
            </div>
            <!-- TILES END-->
        </div>

        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-4">
                    <i class="fab fa-facebook-f" style="font-size:20px; color:black"></i>
                    <i class="fab fa-twitter" aria-hidden="true" style="font-size:20px; color:black; margin-left: 5px;"></i>
                    <i class="fab fa-instagram" aria-hidden="true" style="font-size:20px; color:black; margin-left: 5px;"></i>
                </div>

                <div class="col-sm-4 text-center">
                    <span class="text-danger">CED CAB</span>
                </div>

                <div class="col-sm-4 btn-group btn-group-sm">
                    <button class="btn btn-link">FEATURES</button>
                    <button class="btn btn-link">REVIEWS</button>
                    <button class="btn btn-link">SIGNUP</button>
                </div>
            </div>
        </div>
    </body>
</html>